<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Clerk;
use App\Models\Dentist;
use App\Models\Technician;
use App\Models\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = 'admin/userslist';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'isadmin']);
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
            'username' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'role' => ['required', 'string'],
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
        $user = new User;
        $user->username = $data['username'];
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->password = $data['password'];
        $user->role = $data['role'];

        $temp = "";
        if($user->role == 'student')
        {
            $temp = new Student;
            $temp->student_id = $user->username;
            $temp->student_name = $user->name;
            $temp->student_phone = $user->phone;
            $temp->student_email =  $data['email'];
            $temp->password = Hash::make($data['password']);
        }
        if($user->role == 'technician' || $user->role == 'admin')
        {
            $temp = new Technician;
            $temp->technician_id = $user->username;
            $temp->technician_name = $user->name;
            $temp->technician_phone = $user->phone;
            $temp->technician_email =  $data['email'];
            $temp->password =  Hash::make($data['password']);
        }
        if($user->role == 'dentist')
        {
            $temp = new Dentist;
            $temp->dentist_id = $user->username;
            $temp->dentist_name = $user->name;
            $temp->dentist_phone = $user->phone;
            $temp->dentist_email =  $data['email'];
            $temp->password =  Hash::make($data['password']);
        }
        if($user->role == "clerk")
        {
            $temp = new Clerk;
            $temp->clerk_id = $user->username;
            $temp->clerk_name = $user->name;
            $temp->clerk_phone = $user->phone;
            $temp->clerk_email =  $data['email'];
            $temp->password = Hash::make($data['password']);
        }

        $temp->save();

        if($user->role != 'admin'){
            $user = User::create([
                'name' => $data['username'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => Hash::make($data['password']),
            ]);
        }
        else{
            $user = User::create([
                'name' => $data['username'],
                'email' => $data['email'],
                'role' => 'admin',
                'password' => Hash::make($data['password']),
            ]);
        }


        return $user;
    }
}
