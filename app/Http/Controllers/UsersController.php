<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index(): Collection
    {
        return User::all('name', 'description', 'email');
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'description' => 'required'
        ];

        if (intval($request->input('name'))) {
            $rules['name'] .= '|max_digits:12|numeric';
        } else {
            $rules['name'] .= '|max:12|alpha';
        }

        $request->validate($rules);

        $user = new User();

        $description = explode(',', $request->input('description'));

        $user->setAttribute('name', $request->input('name'));
        $user->setAttribute('description', $description);
        $user->setAttribute('email', $request->input('email'));
        $user->setAttribute('password', Hash::make('password'));
        $user->setAttribute('email_verified_at', now());
        $user->setAttribute('remember_token', Str::random(60));
        $user->save();
        return $user;
    }
}
