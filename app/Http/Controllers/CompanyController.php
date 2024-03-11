<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function company() {

        $companies = Company::find(1);

        return view('company', compact('companies'));
    }
}
