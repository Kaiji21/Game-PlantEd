<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $tasks = Task::all();
        return $this->returnData('tasks', $tasks, 'Tasks retrieved successfully', '200');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_id' => 'required|exists:levels,id',
            'description' => 'required',
            'estimated_duration' => 'required|integer',
            'points' => 'required|integer',
            'learning_content' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $task = Task::create($request->all());

        return $this->returnData('task', $task, 'Task created successfully', '201');
    }
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return $this->returnError(404, 'Task not found');
        }

        return $this->returnData('task', $task, 'Task retrieved successfully', '200');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'level_id' => 'required|exists:levels,id',
            'description' => 'required',
            'estimated_duration' => 'required|integer',
            'points' => 'required|integer',
            'learning_content' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $task = Task::find($id);

        if (!$task) {
            return $this->returnError(404, 'Task not found');
        }

        $task->update($request->all());

        return $this->returnData('task', $task, 'Task updated successfully', '200');
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return $this->returnError(404, 'Task not found');
        }

        $task->delete();

        return $this->returnSuccessMessage('Task deleted successfully', '200');
    }
}
