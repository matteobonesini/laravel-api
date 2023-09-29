<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {

        $lastProjects = Project::orderBy('id', 'desc')->limit(3)->get();

        $count = Project::count();

        return view('admin.dashboard', compact('lastProjects', 'count'));
    }
}
