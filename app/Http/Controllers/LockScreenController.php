<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockScreenController extends Controller
{
    public function showLockScreen()
    {
        if(!session('lock-expires-at'))
        {
            return redirect('/');
        }
        if(!session('lock-expires-at') > now())
        {
            return redirect('/');
        }
        return view('lockscreen');
    }
    // unlock screen
    public function unlock()
    {
        return;
    }
}

