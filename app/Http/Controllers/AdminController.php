<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function viewLoggedIn (Request $request,  $branch)
    {
        if (auth()->user()->role == 'manager') {
            $now = new Carbon;
            $date = $now->format('Y-m-d');

            $log = Log::where('date', $date)->where('branch_id', $branch)->whereNull('punch_out_difference')->get();

            //Return a view with all those logged into that branch

            return 'A view with $log';
        } elseif (auth()->user()->role == 'admin' || auth()->user()->role == 'owner') {
            $now = new Carbon;
            $date = $now->format('Y-m-d');

            $log = Log::where('date', $date)->whereNull('punch_out_difference')->get();

            //Return a view with all those logged in all branch

            return 'A view with $log';
        } else {
            return redirect('/')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

    public function showAll ()
    {
        if (auth()->user()->role == 'super-admin' || auth()->user()->role == 'owner') {
            $allUsers = User::all();

            return view('showAll');
        } else {
            return redirect('/')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }
}