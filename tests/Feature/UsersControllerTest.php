<?php

namespace Tests\Feature;

use App\Http\Controllers\UsersController;
use Illuminate\Database\Eloquent\Casts\Json;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    public function test_that_description_array_not_empty(): void
    {
        $users = (new UsersController)->index();
        $isPassed = true;

        $users->contains(function ($user) use (&$isPassed) {
            if (!$user->description) {
                $isPassed = false;
            }
        });

        $this->assertTrue($isPassed);
    }
}
