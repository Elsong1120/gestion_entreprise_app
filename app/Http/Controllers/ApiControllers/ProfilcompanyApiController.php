<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilcompanyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  Request  $rq

     * @return \Illuminate\Http\Response
     */

    public function index(Request $rq)
    {
        $user = $rq->user();
        if (!$user) {
            return response([
                "message" => "You are not logged in .",
                "data" => [],
                "status" => 401,
                "error" => []
            ]);
        }
        // dd($user->profilcompany()->count());
        $data = [
            "profile" => $user->profilcompany(),
            "Person_contact" => $user->profilcompany()->count()>0 ?$user->profilcompany()->contactpeople():[]
        ];

        return response([
            "message" => "Succes",
            "data" => $data,
            "status" => 200,
            "error" => []
        ]);
    }
}
