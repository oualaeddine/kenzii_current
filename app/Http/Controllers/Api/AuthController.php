<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function respondWithToken($token,$user)
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
         
             'email'=>'required|string|max:255|email|regex:/(.+)@(.+)\.(.+)/i',
             'password'=>'required|min:8|string',
        ]);

         
         if($validator->fails()){
            $response = array($validator->messages());
            $response = $response[0]->first();
            return response()->json(['status'=>false ,'message'=> $response],400);
          }

        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Email or password wrong !',
            ], 401);
        }


        $user = User::where('id',Auth::user()->id)->select('id','name','email')->with('roles',function($q){
            $q->select('id','name');
        })->first();


        $user->device_token = $request->device_token;
        $user->save();


        return $this->respondWithToken($token,$user);
  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
