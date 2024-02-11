<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //Halaman Login
    public function login() {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else{
            return view('pages.login', [
                "title" => "Dashboard | Login",
                "link" => "login"
            ]);
        }
    }

    //Jalankan fungsi Login
    public function store(Request $request) {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Jika otentikasi berhasil
            Session::flash('success', 'Selamat Datang!'); // Tambahkan pesan keberhasilan ke sesi
            return redirect()->intended('/dashboard'); // Ganti '/dashboard' sesuai dengan rute setelah login
        } else {
            // Jika otentikasi gagal
            return back()->with(['error' => 'Email atau Password tidak Sesuai']);
        }
    }
    //Halaman Manage Admin
    public function index() {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('pages.auth.index', [
            "title" => "Data Admin Dashboard",
            "users" => $users,
            "link" => "user"
        ]);
    }

    public function add(Request $request) {
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // You can add any additional logic here, such as sending a welcome email.

        return back()->with('success', 'Berhasil tambah Admin!');
    }

    //Update Password
    public function update($id,Request $request) {
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->email = $request->email;

        if($request->password != NULL) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return back()->with('success', 'Data Admin Berhasil di Ubah');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Data Admin Berhasil di Hapus');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
