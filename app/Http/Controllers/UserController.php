<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return User::latest()->paginate(5);

        // $users = User::where("id", "<>", auth()->user()->id)
        //     ->orderBy("id", "desc")
        //     ->limit(10)
        //     ->get();

        // return response()->json($users);
    }

    public function profile()
    {
        return response()->json(auth()->user());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string|max:100",
            "email" => "required|email|max:190|unique:users",
            "password" => "required|min:6|max:20",
        ]);

        return User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            "name" => "required|string|max:100",
            "email" => "required|email|max:190|unique:users,email,$id",
            "password" => "nullable|min:6|max:20",
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != "") {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return "ok";
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        return "ok";
    }
}
