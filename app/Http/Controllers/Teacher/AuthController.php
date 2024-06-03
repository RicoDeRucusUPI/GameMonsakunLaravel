<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function __construct() {
        $this->teacherModel = new TeacherModel;

    }

    public function login(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('teacher.login');
    }

    public function register() : View {
        return view('teacher.register');
    }

    public function login_process(Request $request){
        $credentials  = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
 
        if (Auth::guard('teacher')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('teacher');
        }

        return redirect('teacher/login')->with('message', 'Email/Password Salah !!');
    }

    public function register_process(Request $request){
        $check_duplicate_email = $this->teacherModel->where('email', $request->email)->get()->toArray();
        if(count($check_duplicate_email) <= 0){
            $this->teacherModel->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'no_telepon' => $request->no_telepon
            ]);
        }else{
            return redirect('teacher/register')->with('message', 'Email Sudah Terdaftar !!');
        }
        return redirect('teacher/login');
    }
}
