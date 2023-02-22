<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        // dd($data[0]->roles[0]->name);
        return view('dashboard.user.index', [
            'datas' => $data,
        ]);
    }
}
