<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Aspirasi };
use Illuminate\Support\Facades\{ Hash, File, DB };

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspirasi =  Aspirasi::latest()->get();
        return response()->json([
            'status' => true,
            'message' => "Data semua aspirasi didapatkan",
            'data' => $aspirasi
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'topik' => ['required', 'min:5'],
                'cerita' => ['required', 'min:20'],
                'jenis_laporan' => ['required'],
                'alamat' => ['required'],
                'kecamatan' => ['required'],
                'kabupaten' => ['required'],
                'foto' => ['required']
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return response()->json([
                'status' => false,
                'message' => $th->validator->errors()
            ], 403);
        }


        $payload = $request->all();

        if($request->file('foto')){
            $payload['foto'] = $request->file('foto')->store('img/Aspirasi', ['disk' => 'public_uploads']);

        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Foto yang anda kirim tidak valid',
                'data' => null
            ], 403);
        }

        $payload['status'] = false;

        $aspirasi = Aspirasi::create($payload);

        return response()->json([
            'status' => true,
            'message' => 'aspirasi berhasil ditambahkan',
            'data' => $aspirasi
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aspirasi = Aspirasi::find($id);

        if(!$aspirasi){
            return response()->json([
                'status' => true,
                'message' => 'Data aspirasi tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data aspirasi didapatkan',
            'data' => $aspirasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $payload = $request->all();

        $aspirasi = $aspirasi->update($payload);

        return response()->json([
            'status' => true,
            'message' => 'Data aspirasi berhasil diupdata',
            'data' => $aspirasi
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspirasi $aspirasi)
    {
        File::delete(public_path($aspirasi->foto));
        $aspirasi->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data aspirasi berhasil dihapus',
            'data' => $aspirasi
        ], 204);
    }
}

