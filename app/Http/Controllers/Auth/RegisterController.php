<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\RoleOfUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'instansi_id' => ['required'],
            'phone' => ['required', 'string', 'max:12'],
            'role_of_request' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'instansi_id' => $data['instansi_id'],
        //     'phone' => $data['phone'],
        // ]);

        $query = new User();
        $query->name = $data['name'];
        $query->email = $data['email'];
        $query->password = Hash::make($data['password']);
        $query->instansi_id = $data['instansi_id'];
        $query->phone = $data['phone'];

        if ($query->save()) {
            $request_role = new RoleOfUserRequest();
            $request_role->user_id = $query->id;
            $request_role->role_of_request = $data['role_of_request'];

            if($request_role->save()) {
              return $query;
            }
        }

    }
}
