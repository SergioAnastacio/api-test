<?php

namespace App\Http\Controllers;

use App\Http\Resources\userResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {

        $user = $request->user();
        return new userResource($user); //* Format output data
    }
}
