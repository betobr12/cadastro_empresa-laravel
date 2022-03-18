<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUnity;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $Company = Company::all();
        $CompanyUnity = CompanyUnity::all();

        return view('index',compact('Company','CompanyUnity'));
    }


}
