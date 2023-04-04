<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) {
        $supports = $support->all();
        // $supports = Support::all();

        return view('admin.supports.index', compact('supports'));
    }
}
