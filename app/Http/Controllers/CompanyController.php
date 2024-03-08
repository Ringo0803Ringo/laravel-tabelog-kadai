<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function company() {

        $companies = Company::all();

        return view('company', compact('companies'));
    }
}
