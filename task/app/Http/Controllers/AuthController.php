<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;

class AuthController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view("admin/Users/user", compact("users", ));
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'role' => 'required|in:user,admin,managers',
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'User name must be unique',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email must be unique',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'phone.max' => 'Phone number must not exceed 20 characters',
            'address.max' => 'Address must not exceed 255 characters',
            'role.required' => 'Role is required',
            'role.in' => 'Invalid role',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->password);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        // Save user to the database
        $user->save();

        return response()->json([
            'status' => 'success',
        ]);
    }


    // update Product
    public function updateUser(Request $request)
    {

        $request->validate([
            'up_name' => 'required|string|max:255|unique:users,name,' . $request->up_id,
            'up_email' => 'required|email|unique:users,email,' . $request->up_id,
            'up_phone' => 'nullable|string|max:20',
            'up_address' => 'nullable|string|max:255',
            'up_role' => [
                'required',
                Rule::in(['user', 'admin', 'managers']),
            ],
        ], [
            'up_name.required' => 'Name is required',
            'up_name.unique' => 'User name must be unique',
            'up_email.required' => 'Email is required',
            'up_email.email' => 'Invalid email format',
            'up_email.unique' => 'Email must be unique',
            'up_phone.max' => 'Phone number must not exceed 20 characters',
            'up_address.max' => 'Address must not exceed 255 characters',
            'up_role.required' => 'Role is required',
            'up_role.in' => 'Invalid role',
        ]);

        User::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'email' => $request->up_email,
            'password' => $request->up_password,
            'phone' => $request->up_phone,
            'address' => $request->up_address,
            'role' => $request->up_role,
        ]);

        return response()->json(['status' => 'success']);

    }

    // delete Product
    public function deleteUser(Request $request)
    {
        User::find($request->user_id)->delete();
        return response()->json(['status' => 'success']);
    }


    // search
    public function search_user(Request $request)
    {
        $searchString = $request->input('search_string');

        // Perform the search query
        $users = User::where('name', 'like', '%' . $searchString . '%')
            ->orWhere('email', 'like', '%' . $searchString . '%')
            ->orWhere('phone', 'like', '%' . $searchString . '%')
            ->orWhere('address', 'like', '%' . $searchString . '%')
            ->orWhere('role', 'like', '%' . $searchString . '%')
            ->orderBy("id", "desc")
            ->get();

        if ($users->count() >= 1) {
            return response()->json(['status' => 'success', 'html' => view('admin.Users.search_results', compact('users'))->render()]);
        } else {
            return response()->json(["status" => "nothing_found"]);
        }
    }


    public function index()
    {
        return view('auth.login');
    }


    public function registration()
    {
        return view('auth/registration');
    }


    // public function postLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         // Check user role
    //         $user = Auth::user();
    //         if ($user->role == 'user') {
    //             Auth::logout();
    //             return redirect('login')->with('error', 'You do not have access to this page.');
    //         }

    //         return redirect()->intended('user')->withSuccess('You have Successfully logged in');
    //     }

    //     return redirect("login")->with('error', 'Oops! You have entered invalid credentials');
    // }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Check user role
            $user = Auth::user();
            if ($user->role !== 'user') {
                return redirect()->intended('user')->withSuccess('You have Successfully logged in');
            }

            Auth::logout();
            return redirect('login')->with('error', 'Oops! You have entered invalid credentials.');
        }

        return redirect("login")->with('error', 'Oops! You have entered invalid credentials');
    }


    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("user")->withSuccess('Great! You have Successfully loggedin');
    }





    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function logout()
    {
        session::flush();
        Auth::logout();

        return Redirect('login');
    }





}
