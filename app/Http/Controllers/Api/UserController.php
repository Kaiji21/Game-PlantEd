<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve a list of users
    }

    public function store()
    {
        // Create a new user
    }

    public function show(User $user)
    {
        // Retrieve a specific user
    }

    public function update(User $user)
    {
        // Update a specific user
    }

    public function destroy(User $user)
    {
        // Delete a specific user
    }
}
