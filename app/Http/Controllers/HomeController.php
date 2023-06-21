<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\event;

use App\Models\Users;

use App\Models\programme;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $event = event::all();
                return view('user.home',compact('event'));
            }
            else
            {
                return view('admin.dashboard');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function viewevent()
    {
        $event = event::all();

        return view('user.view_event',compact('event'));
    }

    public function index()
    {
        return view('welcome');
    }
    public function viewalumni()
    {
        return view('user.view_alumni');
    }

}
