<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $data['allData'] = User::all();
       return view('admin.user.userList',$data);
    }
}
