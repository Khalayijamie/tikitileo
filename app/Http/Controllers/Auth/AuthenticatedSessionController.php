<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'user_type' => ['required', 'string', 'in:user,event_organizer'],
        ]);

        $credentials = $request->only('email', 'password');

        if ($request->user_type == 'user') {
            // Attempt to log in as a regular user
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } elseif ($request->user_type == 'event_organizer') {
            // Attempt to log in as an event organizer
            if (Auth::guard('event_organizer')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('event-organizer.dashboard'));
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        Auth::guard('event_organizer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
