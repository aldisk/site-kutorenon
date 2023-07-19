<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class adminController extends Controller
{
    public function login(Request $request) {
        $request -> validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $data = $request->all();
        $admin = new admin;

        // Check if credential is valid
        $userExist = $admin->hasEntry($data['username']);

        if($userExist == 1) { //if username exist
            $userData = $admin->getEntry($data['username']);
            if($admin->authenticate($data['username'], $data['password'])){
                $request->session()->put('username', $userData->username);
                return redirect('/admin')->with('result', 'success login');
            } else {
                return back()->with('result', 'Wrong password');
            }
        } else { //if credential is not valid
            return back()->with('result', "Username doesn't exist");
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('username');
        return redirect('/admin/login');
    }

}
