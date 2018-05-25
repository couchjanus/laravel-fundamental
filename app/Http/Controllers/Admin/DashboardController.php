<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
      $breadcrumbs = ['Dashboard'=>'/admin'];
        return view('admin.index', ['title' => 'Dashboard Page', 'breadcrumbs' => $breadcrumbs]);
    }
}
