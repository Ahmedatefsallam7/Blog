<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index()
    {

        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }


    public function create()
    {
        return view('users.add_user');
    }


    public function store(Request $request)
    {
        $this->authorize('update', $request->user);
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'image' => ['required', 'image', 'unique:' . User::class],
        ]);


        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'image' => $request->image,
        ]);
        if ($request->hasFile('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('\images\users_imgs\\'), $imgName);

            $path = 'images\users_imgs\\';
            $newUser->update(['image' =>  $path . $imgName]);
        }
        session()->flash('addUser', 'User Added Successfully');
        return to_route('allUsers');
    }


    public function show()
    {
        return 'show';
    }


    public function edit(User $user)
    {
        dd($user->id);
        // return 'edit' . $request->id;
    }


    public function update(Request $request)
    {
        $this->authorize('update', $request->user);
        User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        session()->flash('edit', 'User Updated Successfully');
        return back();
    }


    public function destroy(Request $request)
    {
        $this->authorize('update', $request->user);
        User::find($request->id)->delete();
        session()->flash('deleteUser', 'User Deleted Successfully');
        return back();
    }
}
