<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function statistics()
    {
        $userCounts = User::count();
        return response()->json([
            "userCounts" => $userCounts,
        ]);
    }
}