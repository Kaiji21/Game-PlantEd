<?php

namespace App\Http\Controllers\Api;

use App\Models\Badge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

use Illuminate\Support\Facades\Validator;

class BadgeController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $badges = Badge::all();
        return $this->returnData('badges', $badges, 'Badges retrieved successfully', '200');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image_path' => 'nullable',
            'learning_content' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $badge = Badge::create($request->all());

        return $this->returnData('badge', $badge, 'Badge created successfully', '201');
    }

    public function show($id)
    {
        $badge = Badge::find($id);

        if (!$badge) {
            return $this->returnError(404, 'Badge not found');
        }

        return $this->returnData('badge', $badge, 'Badge retrieved successfully', '200');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image_path' => 'nullable',
            'learning_content' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->returnError(400, $validator->errors()->first());
        }

        $badge = Badge::find($id);

        if (!$badge) {
            return $this->returnError(404, 'Badge not found');
        }

        $badge->update($request->all());

        return $this->returnData('badge', $badge, 'Badge updated successfully', '200');
    }

    public function destroy($id)
    {
        $badge = Badge::find($id);

        if (!$badge) {
            return $this->returnError(404, 'Badge not found');
        }

        $badge->delete();

        return $this->returnSuccessMessage('Badge deleted successfully', '200');
    }
}
