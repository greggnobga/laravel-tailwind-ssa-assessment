<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/dashboard';

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
            'prefixname' => ['nullable', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'suffixname' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
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
        $validator = $this->validator($data);

        /** Return errors if validation error occured. */
        if ($validator->fails()) {
            /** Get the validation errors */
            $errors = $validator->errors();

            /** Return bunch of errors. */
            return redirect()->back()->withErrors($errors);
        }

        /** Save to the database. */
        if ($validator->passes()) {
            /** Execute sql. */
            $user = User::create([
                'prefixname' => strip_tags($data['prefixname']),
                'firstname' => strip_tags($data['firstname']),
                'middlename' => strip_tags($data['middlename']),
                'lastname' => strip_tags($data['lastname']),
                'suffixname' => strip_tags($data['suffixname']),
                'username' => strip_tags($data['username']),
                'email' => strip_tags($data['email']),
                'password' => Hash::make(strip_tags($data['password'])),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);


            if ($user->id) {
                /** Check if user added a file. */
                if (isset($data['photo'])) {
                    /** Store the uploaded photo and get the path */
                    $path = $data['photo']->store('photos', 'local');

                    /** Check if path is set then save it. */
                    if ($path) {
                        DB::table('users')
                            ->where('id', '=', $user->id)
                            ->update([
                                'photo' => $path,
                            ]);
                    }
                }
            }

            /** Return user. */
            return $user;
        }
    }
}
