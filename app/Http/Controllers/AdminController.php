<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }
    public function allAdmins()
    {
        $users = DB::table('users')->select('*')->where('role', '=', '1')->paginate(6);
        return view('Admin.users', ['users' => $users, 'page' => 'Admins']);
    }
    public function allUsers()
    {
        $users = DB::table('users')->select('*')->where('role', '=', '0')->paginate(6);
        return view('Admin.users', ['users' => $users, 'page' => 'Client']);
    }
    public function roleGenerate(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
        ]);

        $id = $request->userId;

        if (!isset($request->upgrade)) {
            // downgrade
            $user = DB::table('users')->select('role')->where('id', '=', $id)->get();

            DB::table('users')
                ->where('id', $id)
                ->update(['role' => 0]);

            return  redirect('/clients')->with('success', 'le role change a client');
        } else {
            // upgrade

            $user = DB::table('users')->select('role')->where('id', '=', $id)->get();

            DB::table('users')
                ->where('id', $id)
                ->update(['role' => 1]);

            return  redirect('/admins')->with('success', 'le role change a admin');
        }
    }
}
