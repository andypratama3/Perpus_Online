<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __invoke(){


        return view('dashboard.index');
    }
}
