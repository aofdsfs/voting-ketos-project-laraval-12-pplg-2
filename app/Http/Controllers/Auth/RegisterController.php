<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\HasFactory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;      // <<-- Pastikan ini ada
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
    return User::create([
        'nama' => $data['nama'],
        'kelas' => $data['kelas'],
        'jurusan' => $data['jurusan'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
}
public function register(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kelas' => 'required|string|max:10',
        'jurusan' => 'required|string|max:50',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'siswa',
    ]);

    Auth::login($user);

    return redirect('/vote');  // Pastikan ini diarahkan ke halaman voting
}

    protected function redirectTo()
{
    return route('vote.index'); // setelah register langsung ke vote
}



    }
