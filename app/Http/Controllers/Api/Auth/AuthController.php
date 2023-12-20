<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    use GeneralTrait;

    public function Login(Request $request)
    {
        try{
            $rules = [
                "email" => "required",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return $this->returnError(400,$validator->errors());
            }
            $user = User::where('email', $request->input('email'))->first();

            if (!$user) {
                return $this->returnError('E001', 'Invalid credentials');
            }
            if ($user->role == 'admin') {
                $guard = 'admin-api';
            }
            else{
                $guard = 'api';
            }

            $credentials = $request->only(['email', 'password']);
            $token = Auth::guard($guard)->attempt($credentials);

            if (!$token) {
                return $this->returnError('E001', 'Invalid credentialsss');
            }

            $user->auth_token = $token;
            return $this->returnData('user', $user,'User Logged in successfully', '200');




        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function Logout(Request $request)
    {
        $token = $request -> header('auth-token');
        if($token){
            try {
                // dd($token);



                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Exception $e){
                return  $this -> returnError('',$e->getMessage());
            }
            return $this->returnSuccessMessage(' Logged out successfully');
        }else{
            return $this -> returnError(400,'some thing went wrongs');
        }

    }

    public function profile()
    {
        try {
                $user = Auth::user();

            return $this->returnData('user', $user, 'User profile retrieved successfully', '200');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }


}
