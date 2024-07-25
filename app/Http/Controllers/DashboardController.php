<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'blogPostDashboardSummary' => BlogPost::getBlogPostDashboardSummary()
        ]);
    }
}
