<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function index(): Collection
    {
        return User::all();
    }
}
