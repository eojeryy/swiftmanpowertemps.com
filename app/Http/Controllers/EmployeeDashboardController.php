<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EmployeeDashboardController extends Controller
{
    public function index(): View
    {
        return view('employee.dashboard');
    }
}
