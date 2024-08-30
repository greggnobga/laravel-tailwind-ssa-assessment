<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /** List all users. */
    public function index(Request $request)
    {
        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to GET. */
        if ($method == 'GET') {
            /** User list. */
            $users = User::all();

            /** Return something. */
            return View::make('users.index', compact('users'))->render();
        }
    }

    /** Show user. */
    public function show($id)
    {
        /** Check if id has value. */
        if ($id) {
            /** Fetch user. */
            $user = User::find($id);

            /** Use avatar model accessor.  */
            $avatar = $user->avatar;

            /** Use fulname model accessor. */
            $fullname = $user->fullname;

            /** Use middle initial model accessor. */
            $initial = $user->middleinitial;

            /** Return something. */
            return View::make('users.show', compact('user', 'avatar', 'fullname', 'initial'))->render();
        } else {
            /** Return something. */
            return View::make('users.index', [])->render();
        }
    }

    /** Update user. */
    public function update($id, Request $request)
    {
        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to GET. */
        if ($method == 'GET') {
            /** Check if id has value. */
            if ($id) {
                /** Fetch user. */
                $user = User::find($id);

                /** Return something. */
                return View::make('users.update', compact('user'))->render();
            } else {
                /** Return something. */
                return View::make('users.index', [])->render();
            }
        }


        /** Check if method is equal to POST. */
        if ($method == 'POST') {

            /** Validate request data */
            $validator = Validator::make($request->all(), [
                'prefixname' => ['nullable', 'string', 'max:255'],
                'firstname' => ['required', 'string', 'max:255'],
                'middlename' => ['nullable', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'suffixname' => ['nullable', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            ]);

            /** Return errors if validation error occured. */
            if ($validator->fails()) {
                /** Get the validation errors */
                $errors = $validator->errors();

                /** Return bunch of errors. */
                return redirect()->back()->withErrors($errors);
            }

            /** Save to the database. */
            if ($validator->passes()) {

                /** Get userid from database. */
                $updID = DB::table('users')->where('id', '=', $id)->select('id')->first();

                if ($updID) {
                    /** Upadte user. */
                    DB::table('users')
                        ->where('id', '=', $id)
                        ->update([
                            'prefixname' => strip_tags($request->prefixname),
                            'firstname' => strip_tags($request->firstname),
                            'middlename' => strip_tags($request->middlename),
                            'lastname' => strip_tags($request->lastname),
                            'suffixname' => strip_tags($request->suffixname),
                            'password' => Hash::make(strip_tags($request->password)),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);


                    /** Check if user added a file. */
                    if ($request->hasFile('photo')) {
                        /** Store the uploaded photo and get the path */
                        $path = $request->file('photo')->store('photos', 'local');

                        /** Check if path is set then save it. */
                        if ($path) {
                            DB::table('users')
                                ->where('id', '=', $id)
                                ->update([
                                    'photo' => $path,
                                ]);
                        }
                    }
                }

                /** Return something. */
                return redirect('/dashboard')->with(['success' => 'Updated successfully.']);
            }
        }
    }

    /** Delete user. */
    public function destroy($id, Request $request)
    {
        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to GET. */
        if ($method == 'GET') {
            /** Check if id has value. */
            if ($id) {
                /** Fetch user. */
                $user = User::find($id);

                /** Return something. */
                return View::make('users.delete', compact('user'))->render();
            } else {
                /** Return something. */
                return View::make('users.index', [])->render();
            }
        }


        /** Check if method is equal to POST. */
        if ($method == 'POST') {

            /** Execute deletion. */
            $user = User::find($id);
            $user->delete();

            /** Return something. */
            return redirect('/dashboard')->with(['success' => 'Deleted successfully.']);
        }
    }

    /** Custom registration. */
    public function create(Request $request)
    {

        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to GET. */
        if ($method == 'GET') {
            /** Return something. */
            return View::make('users.create', [])->render();
        }

        /** Check if method is equal to POST. */
        if ($method == 'POST') {

            /** Validate request data */
            $validator = Validator::make($request->all(), [
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

            /** Return errors if validation error occured. */
            if ($validator->fails()) {
                /** Get the validation errors */
                $errors = $validator->errors();

                /** Return bunch of errors. */
                return redirect()->back()->withErrors($errors);
            }

            /** Save to the database. */
            if ($validator->passes()) {
                /** Get newly registed user id. */
                $id = DB::table('users')
                    ->insertGetId([
                        'prefixname' => strip_tags($request->prefixname),
                        'firstname' => strip_tags($request->firstname),
                        'middlename' => strip_tags($request->middlename),
                        'lastname' => strip_tags($request->lastname),
                        'suffixname' => strip_tags($request->suffixname),
                        'username' => strip_tags($request->username),
                        'email' => strip_tags($request->email),
                        'password' => Hash::make(strip_tags($request->password)),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                if ($id) {
                    /** Check if user added a file. */
                    if ($request->hasFile('photo')) {
                        /** Store the uploaded photo and get the path */
                        $path = $request->file('photo')->store('photos', 'local');

                        /** Check if path is set then save it. */
                        if ($path) {
                            DB::table('users')
                                ->where('id', '=', $id)
                                ->update([
                                    'photo' => $path,
                                ]);
                        }
                    }
                }

                /** Return something. */
                return redirect('/dashboard')->with(['success' => 'Created successfully.']);
            }
        }
    }

    /** Sof delete user. */
    public function trashed(Request $request)
    {
        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to GET. */
        if ($method == 'GET') {
            $deleted = User::onlyTrashed()->get();

            /** Return something. */
            return View::make('users.trashed', compact('deleted'))->render();
        }

        /** Check if method is equal to POST. */
        if ($method == 'POST') {

            /** Attempt to authenticate Users. */
            if (!Auth::attempt($request->only('email', 'password'))) {
                return redirect()->back()->withErrors(['error' => 'Login Failed']);
            }

            /** Return something. */
            return redirect('/dashboard')->with(['success' => 'Login Succeed']);
        }
    }

    /** Restore soft deleted user. */
    public function restore($id, Request $request)
    {
        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to POST. */
        if ($method == 'POST') {

            /** Initiate restoration. */
            $user = User::withTrashed()->find($id);
            $user->restore();

            /** Return something. */
            return redirect('/users')->with(['success' => 'User restored successfully.']);
        }
    }

    /** Delete soft deleted user. */
    public function delete($id, Request $request)
    {
        /** Get request method. */
        $method = $request->method();

        /** Check if method is equal to POST. */
        if ($method == 'POST' || $method == 'DELETE') {

            /** Initiate restoration. */
            $user = User::withTrashed()->find($id);
            $user->forceDelete();

            /** Return something. */
            return redirect('/users')->with(['success' => 'User deleted successfully.']);
        }
    }
}
