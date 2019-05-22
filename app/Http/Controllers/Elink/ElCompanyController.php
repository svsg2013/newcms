<?php

namespace App\Http\Controllers\Elink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElCompanyController extends Controller
{
    public function __construct() {

    	$this->middleware('auth:e-link');
    }


    public function index()
    {
    	return view('elink.layouts.master');
    }
}
