<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class LandingController extends Controller
{
    public function aspirasi()
    {
        return view("forms.aspirasi");
    }

    public function store(Request $request){
        $payload = $request->all();
        
        $foto = [];
        if($request->file('foto')){
            $foto = [ 
                "foto" => $request->file('foto')
            ];
        }

        $responseBook = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:9000/api/Aspirasi",
            $payload,
            $foto
        );
        if($responseBook['status'] == false){
            return back()->withErrors($responseBook['message'])->withInput($payload);
        }

        $book = $responseBook['data'];
        return redirect()->route('form.aspirasi')->with('success', 'Pengiriman form berhasil!');
    }
}
