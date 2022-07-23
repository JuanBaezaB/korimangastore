<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        return response()->view('admin.basic_management.public_site_configuration.index');
    }
}
