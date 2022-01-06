<?php

namespace FactoryCms\FactoryCms\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemAdminDashboardController extends Controller
{
    public function index()
    {
        return view('easy::system_admin.index');
    }
}
