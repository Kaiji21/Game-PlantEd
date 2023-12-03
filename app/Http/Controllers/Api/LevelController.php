<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $levels = Level::all();
        return $this->returnData('levels', $levels, 'Levels retrieved successfully', '200');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'difficulty' => 'required|string',
            'required_points' => 'required|integer',
            'learning_objective' => 'required|string',

        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $level = Level::create($request->all());

        return $this->returnData('level', $level, 'Level created successfully', '201');
    }

    public function show($id)
    {
        $level = Level::find($id);

        if (!$level) {
            return $this->returnError(404, 'Level not found');
        }

        return $this->returnData('level', $level, 'Level retrieved successfully', '200');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'difficulty' => 'required|string',
            'required_points' => 'required|integer',
            'learning_objective' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $level = Level::find($id);

        if (!$level) {
            return $this->returnError(404, 'Level not found');
        }

        $level->update($request->all());

        return $this->returnData('level', $level, 'Level updated successfully', '200');
    }

    public function destroy($id)
    {
        $level = Level::find($id);

        if (!$level) {
            return $this->returnError(404, 'Level not found');
        }

        $level->delete();

        return $this->returnSuccessMessage('Level deleted successfully', '200');
    }
}
