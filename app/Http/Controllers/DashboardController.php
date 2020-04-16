<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('dashboard')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak Akses');
        });
    }

    public function index()
    {
        $title='Dashboard';
        return view('admin.dashboard',compact('title'));
    }
}
