<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SuperAdminStaffAccountController extends Controller
{
    public function index(): View
    {
        return view('super-admin.staff-accounts.index', [
            'staffAccounts' => User::where('role', User::ROLE_BLOG_STAFF)
                ->latest()
                ->get(),
        ]);
    }

    public function show(User $staffAccount): View
    {
        return view('super-admin.staff-accounts.show', [
            'staffAccount' => $this->resolveStaffAccount($staffAccount),
        ]);
    }

    public function edit(User $staffAccount): View
    {
        return view('super-admin.staff-accounts.edit', [
            'staffAccount' => $this->resolveStaffAccount($staffAccount),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_super_admin' => false,
            'role' => User::ROLE_BLOG_STAFF,
        ]);

        return redirect()
            ->route('super-admin.staff-accounts.index')
            ->with('status', 'Blog staff account created successfully.');
    }

    public function update(Request $request, User $staffAccount): RedirectResponse
    {
        $staffAccount = $this->resolveStaffAccount($staffAccount);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$staffAccount->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $staffAccount->name = $validated['name'];
        $staffAccount->email = $validated['email'];

        if (! empty($validated['password'])) {
            $staffAccount->password = Hash::make($validated['password']);
        }

        $staffAccount->save();

        return redirect()
            ->route('super-admin.staff-accounts.index')
            ->with('status', 'Blog staff account updated successfully.');
    }

    public function destroy(User $staffAccount): RedirectResponse
    {
        $staffAccount = $this->resolveStaffAccount($staffAccount);
        $staffAccount->delete();

        return redirect()
            ->route('super-admin.staff-accounts.index')
            ->with('status', 'Blog staff account deleted successfully.');
    }

    protected function resolveStaffAccount(User $staffAccount): User
    {
        if (! $staffAccount->isBlogStaff()) {
            throw new ModelNotFoundException();
        }

        return $staffAccount;
    }
}
