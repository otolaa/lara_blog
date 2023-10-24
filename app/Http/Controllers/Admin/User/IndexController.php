<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::paginate(20);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = User::getRole();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $password = $data['password'];   // Str::random(10);
        $data['password'] = Hash::make($password);
        User::firstOrCreate(['email'=>$data['email']], $data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = User::getRole();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        if (isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        $user->update($data);
        return view('admin.user.show', compact('user'));
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $exception) {
            \Session::flash('success', $exception->getMessage());
        }

        return redirect()->route('admin.user.index');
    }
}
