<?php

namespace App\Http\Controllers\Api;

use App\Models\UserBadge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Validator;

class UserBadgeController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $userBadges = UserBadge::all();
        return $this->returnData('userBadges', $userBadges, 'User Badges retrieved successfully', '200');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'badge_id' => 'required|exists:badges,id',
            'earned_at' => 'nullable|date',
            'learning_feedback' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $userBadge = UserBadge::create($request->all());

        return $this->returnData('userBadge', $userBadge, 'User Badge created successfully', '201');
    }

    public function show($id)
    {
        $userBadge = UserBadge::find($id);

        if (!$userBadge) {
            return $this->returnError(404, 'User Badge not found');
        }

        return $this->returnData('userBadge', $userBadge, 'User Badge retrieved successfully', '200');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'badge_id' => 'required|exists:badges,id',
            'earned_at' => 'nullable|date',
            'learning_feedback' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $userBadge = UserBadge::find($id);

        if (!$userBadge) {
            return $this->returnError(404, 'User Badge not found');
        }

        $userBadge->update($request->all());

        return $this->returnData('userBadge', $userBadge, 'User Badge updated successfully', '200');
    }

    public function destroy($id)
    {
        $userBadge = UserBadge::find($id);

        if (!$userBadge) {
            return $this->returnError(404, 'User Badge not found');
        }

        $userBadge->delete();

        return $this->returnSuccessMessage('User Badge deleted successfully', '200');
    }
}
