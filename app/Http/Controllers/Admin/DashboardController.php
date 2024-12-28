<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $data = array(
        'route' => 'admin.dashboard.',
        'title' => 'Dashboard',
        'menu' => 'mainmenu',
        'submenu' => 'submenu',
    );

    public function dashboard(){
        return view('admin.dashboard.dashboard_new',$this->data);
    }
}
