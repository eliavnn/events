<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        $organizations = $request->user()->organizations;
        return Inertia::render('Organizations/Index', ['organizations' => $organizations]);
    }
}
