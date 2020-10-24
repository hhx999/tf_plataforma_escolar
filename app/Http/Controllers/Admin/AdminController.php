<?php

namespace PlataformaEDUCA\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PlataformaEDUCA\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.dashboard');
	}
}
