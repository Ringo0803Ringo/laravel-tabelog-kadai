<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function company() {

        $companies = Company::find(1);

        return view('company', compact('companies'));
    }
}
