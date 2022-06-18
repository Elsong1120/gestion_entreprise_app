<?php

namespace App\Http\Controllers;

use App\Models\Profilcompany;
use Illuminate\Http\Request;

class ProfilcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profilCompanies = Profilcompany::all();

        return view('Profilcompany.allProfilcompany', compact('profilCompanies'));
    }
}
