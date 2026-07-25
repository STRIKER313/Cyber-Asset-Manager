<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginOperatorForm()
    {
        return view('login-operator');
    }

    public function showRegisterOperatorForm()
    {
        return view('register-operator');
    }

    public function loginAdminProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        if ($username === 'STRIKER' && $password === 'NATE HIGGERS') {
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_name', $username);
            return redirect()->route('dashboard_admin');
        }

        return back()->with('error', 'Sorry bro, you are not admin!');
    }

    public function loginUserProcess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $name     = $request->name;
        $email    = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found. Please register first!');
        }

        if ($user->name !== $name || !Hash::check($password, $user->password)) {
            return back()->with('error', 'Incorrect name or password!');
        }
        
        $request->session()->put('user_logged_in', true);
        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_role', $user->role);

        if ($user->role === 'operator') {
            return redirect()->route('dashboard_operator');
        }

        return redirect()->route('dashboard_user');
    }

    public function registerUserProcess(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $role = 'user';

        $exists = DB::table('users')->where('email', $request->email)->first();
        if ($exists) {
            return back()->with('error', 'Email already registered!');
        }

        DB::table('users')->insert([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login-user')->with('success', 'Registration successful! Please login.');
    }

    public function dashboardAdmin(Request $request)
    {
        $adminName = $request->session()->get('admin_name');
        $users = DB::table('users')
            ->whereIn('role', ['user', 'operator'])
            ->select('id', 'name', 'email', 'role', 'created_at')
            ->orderBy('role', 'desc')
            ->get();
        return view('dashboard-admin', ['admin_name' => $adminName, 'users' => $users]);
    }

    public function dashboardUser(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $user = DB::table('users')->find($userId);

        if (!$user) {
            $request->session()->flush();
            return redirect()->route('login-user')->with('error', 'Failed to retrieve user data.');
        }

        return view('dashboard-user', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }

    public function loginOperatorProcess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $name     = $request->name;
        $email    = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found. Please register first!');
        }

        if ($user->role !== 'operator' || $user->name !== $name || !Hash::check($password, $user->password)) {
            return back()->with('error', 'Incorrect name or password, or you are not an Operator!');
        }
        
        $request->session()->put('operator_logged_in', true); 
        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_role', $user->role);

        return redirect()->route('dashboard_operator');
    }

    public function registerOperatorProcess(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $role = 'operator';

        $exists = DB::table('users')->where('email', $request->email)->first();
        if ($exists) {
            return back()->with('error', 'Email already registered!');
        }

        DB::table('users')->insert([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login-operator')->with('success', 'Registration successful! Please login as Operator.');
    }
}