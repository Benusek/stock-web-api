<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SupplyController extends Controller
{
    public function index()
    {
        return view('supplies.index');
    }

    public function show()
    {
        return view('supplies.show');
    }

    public function create()
    {
        return view('supplies.create');
    }
}
