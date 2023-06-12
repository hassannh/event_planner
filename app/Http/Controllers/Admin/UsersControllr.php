<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersControllr extends Controller
{
    // Example controller function
public function index()
{
    // Retrieve data from a data source
    $data = User::all();

    // Pass data to the index view
    return view('admin.user.index', ['data' => $data]);
}


public function create()
{
    return view('admin.user.create');
}



public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'company' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role_as' => ['required'],
    ]);

    if ($validator->passes()) {
        $user = new User;
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->role_as = $request->role_as;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();

        $request->session()->flash('success', 'User added successfully');
        return redirect()->route('user.index');
    }

    return back()->withErrors($validator)->withInput();
}


public function destory($id, Request $request)
{
    $user = User::findOrFail($id);
    $user->delete();
    $request->session()->flash('success', 'User deleted successfully');
    return redirect()->route('user.index');
}


public function edit($id){
    $user = User::find($id);
  

    return view('admin.user.edit',['user'=> $user]);
  }

  public function update($id, Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'company' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
       
        'role_as' => ['required'],
    ]);
   

    if ($validator->passes()) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->role_as = $request->role_as;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();
       
        $request->session()->flash('success', 'User updated successfully');
        return redirect('admin/user');

    }
}

}
