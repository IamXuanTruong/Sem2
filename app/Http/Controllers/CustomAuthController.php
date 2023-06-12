<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class CustomAuthController extends Controller
{
    public function home()
    {
        return view('homepage');
    }
    public function Lienhe()
    {
        return view('Lienhe');
    }
    public function blog()
    {
        return view('blog');
    }
    public function index()
    {
        return view('login');
    }
    public function Gioithieu()
    {
        return view('Gioithieu');
    }
    public function cart()
    {
        return view('cart');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->with('message', 'Bạn cần đăng kí!');
        }

        return redirect('/login')->with('message', 'Đăng nhập không hợp lệ');
    }

    public function signup()
    {
        return view('registration');
    }

    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|numeric|',

        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect("login");
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('homepage');
        }
        return redirect('login');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('signup');
    }

    public function handle($request, Closure $next)
    {
        $visitors = Cache::get('visitors', 0); // Lấy giá trị số lượng người truy cập từ cache
        $visitors++; // Tăng số lượng người truy cập lên 1
        Cache::put('visitors', $visitors, 60); // Lưu giá trị số lượng người truy cập vào cache trong 60 phút

        return $next($request);
    }
}
