<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Validator;




class UserController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $users = User::all();
        return $this->returnData('users', $users,'All Users retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()){
            return $this->returnError(400,$validator->errors());
        }
        $user = User::create($request->all());

        return $this->returndata('User',$user,'User Created successfully','201');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->returnError(404, 'User not found');
        }

        return $this->returnData('user', $user, 'User retrieved successfully', '200');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $user = User::find($id);

        if (!$user) {
            return $this->returnError(404, 'User not found');
        }

        $user->update($request->all());

        return $this->returnData('user', $user, 'User updated successfully', '200');
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->returnError(404, 'User not found');
        }

        $user->delete();

        return $this->returnSuccessMessage('User deleted successfully', '200');
    }
}
