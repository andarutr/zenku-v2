<?php

namespace App\Http\Controllers\Penguji;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $menu = 'Dashboard';
        return view('pages.penguji.dashboard', compact('menu'));
    }
}
