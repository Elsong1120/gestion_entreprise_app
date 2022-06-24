<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Companydata;
use Illuminate\Http\Request;

class CompanydataApiController extends Controller
{
    public function checkVatNumber($vatNumber)
    {
        $company = Companydata::where('vat_number', '=', $vatNumber)->first();

        if ($company) {
            return response([
                "valid" => true,
                "countryCode" => $company->country_code,
                "vatNumber" => $company->vat_number,
                "name" => $company->company_name,
                "address" => [
                    "street" => $company->street,
                    "number" => $company->nb_building,
                    "zip_code" => $company->zip_code,
                    "city" => $company->city,
                    "country" => $company->country,
                    "countryCode" => $company->country_code,

                ],
                "strAddress" => $company->street . ' ' . $company->nb_building . ' ' . $company->zip_code . ' ' . $company->city,
            ]);
        }

        return response([
            "valid" => false,
            "countryCode" => "",
            "vatNumber" => "",
            "name" => "",
            "address" => [
                "street" => "",
                "number" => "",
                "zip_code" => "",
                "city" => "",
                "country" => "",
                "countryCode" => "",

            ],
            "strAddress" => "",
        ]);
    }
}
