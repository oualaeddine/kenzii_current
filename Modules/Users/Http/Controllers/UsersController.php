<?php

namespace Modules\Users\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Users\Http\Requests\SaveUserRequest;
use Modules\Users\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::select('id', 'name')->get();
        $breadcrumbs = [
            ['link' => "users", 'name' => "Users"], ['name' => "list"]
        ];
        $users = User::where('id','!=',Auth::user()->id)->paginate(10);
        return view('users::index', [
            'users' => $users,

        ])->with([
            'roles' => $roles,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::create');
    }


    public function store(SaveUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->update([
            'password' => Hash::make($request->password),
            'is_active' => 1
        ]);
        $user->assignRole([$request->roles]);
        return redirect()->route('users.index')->with('success', 'User Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('users::edit');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'is_active' => $request->is_active,
        ]);
        if (!is_null($request->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }
            $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'User Updated Successfully');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted!');
    }

    public function profile(User $user)
    {
        $roles_perms_array=$user->roles()->with('permissions')->get();

        foreach($roles_perms_array as $role){
            foreach ($role->permissions as $permission){
                $rpa[]=$permission->name;
            }
        }

        $arr=$user->getAllPermissions()->pluck('name')->toArray();
        return view('users::detail', [
            'roles'=>Role::all(),
            'user' => $user,
            'permissions'=>Permission::all(),
            'user_all_permissions'=>$arr,
            'rpa'=>$rpa,
            'user_roles'=>$user->roles()->pluck('name')
        ]);
    }

    public function updatePermissions(Request $request, User $user)
    {

        $user->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Permissions Synced');
    }
}
