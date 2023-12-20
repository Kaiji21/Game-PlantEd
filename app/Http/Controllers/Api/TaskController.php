<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\UserTask;
use App\Models\User;
use Carbon\Carbon;


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

    public function startTask(Request $request, $taskId)
    {
        $user = auth()->user();

        if (!($user instanceof User)) {
            return $this->returnError(500, 'Invalid user type');
        }

        if ($user->tasks()->where('tasks.id', $taskId)->exists()) {
            return $this->returnError(400, 'Task already started');
        }

        UserTask::create([
            'user_id' => $user->id,
            'task_id' => $taskId,
            'started_at' => now(),
        ]);


        return $this->returnSuccessMessage('Task started successfully', '200');
    }

    public function completeTask(Request $request, $taskId)
    {
        $user = auth()->user();

        if (!($user instanceof User)) {
            return $this->returnError(500, 'Invalid user type');
        }

        // Check if the task is already completed for the user
        $userTask = $user->tasks()->where('id', $taskId)->first();

        if ($userTask && $userTask->completed) {
            return $this->returnError(400, 'Task already completed');
        }

        $task = Task::find($taskId);

        if (!$task) {
            return $this->returnError(404, 'Task not found');
        }

        // Capture the start and end time of the task submission
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::now();

        // Calculate the duration taken by the user to complete the task in minutes
        $durationInMinutes = $endTime->diffInMinutes($startTime);

        // Compare the user's duration with the task's estimated duration
        $estimatedDuration = $task->estimated_duration;

        // Assign points based on the comparison
        $earnedPoints = ($durationInMinutes <= $estimatedDuration) ? $task->points : 0;

        // Update the user_tasks table with completion status, earned points, and duration
        if ($userTask) {
            $userTask->update([
                'completed' => true,
                'points_earned' => $earnedPoints,
                'duration' => $durationInMinutes,
            ]);
        } else {
            UserTask::create([
                'user_id' => $user->id,
                'task_id' => $taskId,
                'completed' => true,
                'points_earned' => $earnedPoints,
                'duration' => $durationInMinutes,
            ]);
        }

        // You can add logic for rewards, penalties, or feedback here

        return $this->returnSuccessMessage('Task completed successfully', '200');
    }

    public function getTasksForLevel($levelId)
    {
        $tasks = Task::where('level_id', $levelId)->get();

        return $this->returnData('tasks', $tasks, 'Tasks for level retrieved successfully', '200');
    }

    public function submitTaskAnswers(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $userAnswers = $request->input('user_answers');

        // Check if user answers are correct
        if ($this->areAnswersCorrect($task->correct_answers, $userAnswers)) {
            // User's answers are correct
            // Mark the task as completed for the user
            $user = auth()->user();
            if (!($user instanceof User)) {
                return $this->returnError(500, 'Invalid user type');
            }

            $user->tasks()->attach($taskId, ['completed' => true]);

            // Add logic for rewards, feedback, etc.
            // For example, update user's total points
            $user->update(['total_points' => $user->total_points + $task->points]);

            return $this->returnSuccessMessage('Correct answers submitted', 200);
        } else {
            // User's answers are incorrect
            // Add logic for penalties, feedback, etc.
            return $this->returnError(400, 'Incorrect answers submitted');
        }
    }

    private function areAnswersCorrect($correctAnswers, $userAnswers)
    {

        return $correctAnswers === $userAnswers;
    }

}
