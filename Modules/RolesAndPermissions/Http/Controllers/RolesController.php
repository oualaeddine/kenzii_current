<?php

namespace Modules\RolesAndPermissions\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('rolesandpermissions::role.index',[
            'roles'=>Role::with('permissions')->paginate(10),
            'permissions'=>Permission::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('rolesandpermissions::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $role =Role::create(['name'=>$request->name]);
        $role->givePermissionTo($request->permissions);
        return redirect()->back()->with('success','Role Created');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('rolesandpermissions::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('rolesandpermissions::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('success','Role Permissions Synced');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success','Role Archived');
    }
}
