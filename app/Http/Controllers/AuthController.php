<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only('email','password'))){
            //decimos que el usuario no es autorizado
            return $this->error('', 'Credenciales incorrectas', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->succes([
            'user'=> $user,
            'token'=>$user->createToken('API token de'. $user->name)->plainTextToken
        ]);
    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return $this->successResponse([
            'user'=>$user,
            'token'=>$user->createToken('API token de'. $user->name)->plainTextToken
        ]);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();

        return $this->successResponse('has cerrado sesion');
    }
}
