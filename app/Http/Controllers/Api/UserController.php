<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Lista todos os usuários cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(User::all());
    }
}
