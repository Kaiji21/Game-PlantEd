<?php

namespace App\Http\Controllers\Api;

use App\Models\UserProgress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Validator;

class UserProgressController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $userProgresses = UserProgress::all();
        return $this->returnData('userProgresses', $userProgresses, 'User Progresses retrieved successfully', '200');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'level_id' => 'required|exists:levels,id',
            'completed_at' => 'nullable|date',
            'earned_points' => 'required|integer',
            'learning_feedback' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $userProgress = UserProgress::create($request->all());

        return $this->returnData('userProgress', $userProgress, 'User Progress created successfully', '201');
    }

    public function show($id)
    {
        $userProgress = UserProgress::find($id);

        if (!$userProgress) {
            return $this->returnError(404, 'User Progress not found');
        }

        return $this->returnData('userProgress', $userProgress, 'User Progress retrieved successfully', '200');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'level_id' => 'required|exists:levels,id',
            'completed_at' => 'nullable|date',
            'earned_points' => 'required|integer',
            'learning_feedback' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $userProgress = UserProgress::find($id);

        if (!$userProgress) {
            return $this->returnError(404, 'User Progress not found');
        }

        $userProgress->update($request->all());

        return $this->returnData('userProgress', $userProgress, 'User Progress updated successfully', '200');
    }

    public function destroy($id)
    {
        $userProgress = UserProgress::find($id);

        if (!$userProgress) {
            return $this->returnError(404, 'User Progress not found');
        }

        $userProgress->delete();

        return $this->returnSuccessMessage('User Progress deleted successfully', '200');
    }
}
