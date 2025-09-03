<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['company','agent'])->latest()->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $companies = \App\Models\Company::orderBy('name')->get();
        return view('users.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_id' => ['nullable','integer','exists:companies,id'],
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','string','min:6'],
            'role' => ['required', Rule::in(['super_admin','company_admin','agent','user'])],
        ]);

        $user = User::create([
            'company_id' => $data['company_id'] ?? null,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $companies = \App\Models\Company::orderBy('name')->get();
        return view('users.edit', compact('user','companies'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'company_id' => ['nullable','integer','exists:companies,id'],
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'password' => ['nullable','string','min:6'],
            'role' => ['required', Rule::in(['super_admin','company_admin','agent','user'])],
        ]);

        if (!empty($data['password'])) {
            $user->update($data);
        } else {
            unset($data['password']);
            $user->update($data);
        }

        return redirect()->route('users.index')->with('success', 'User updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }
}
