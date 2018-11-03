<?php

namespace App\Http\Controllers;

use Business\Entity\Model\User\UserEntity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserEntity $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $user = $this->user->all();

        if($user)
        {
            return view('admin.index',['user'=>$user]);
        }

        App::abort(404);
    }
}
