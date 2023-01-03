<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\{ Request, Response };
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{
    public function login(Request $rq){
        if($rq->method() == "GET"){
            return view('admin.login');
        }

        $email = $rq->input('email');
        $password = $rq->input('password');

        $admin = admin::query()->where('email', $email)->first();
        if($admin == null){
            return redirect()->back()->withErrors([
                "message" => "Email Tidak Ditemukan"
            ]);
        }

        if(!Hash::check($password, $admin->password)){
            return redirect()->back()->withErrors([
                "message" => "Password Salah"
            ]);
        }

        if(!session()->isStarted()) session()->start();
            session()->put("logged", "yes", true);
            session()->put("idadmin", $admin->id);
            return redirect()->route("admin.list");

    }

    public function logout(){
        session()->flush();
        return redirect(route('welcome'));
    }

    public function index(){
        $responseAspirasi = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:9000/api/Aspirasi"
        );
        $aspirasi = $responseAspirasi['data'];
        return view('admin.list', [
            'title' => 'test',
            'icon' => 'test',
            "aspirasi" => $aspirasi
        ]);
    }

    public function show($id){
        $responseAspirasi = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:9000/api/Aspirasi/" . $id
        );

        $payload['status'] = true;

        $aspirasi = $responseAspirasi['data'];

        $responseAspirasi = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:9000/api/Aspirasi/update/" . $id,
            $payload
        );

        return view('admin.detail', [
            'title' => 'test',
            'icon' => 'test',
            "aspirasi" => $aspirasi
        ]);
    }

    public function list(){
        $admins = admin::query()->get();
        return view('admin.listadmin', [
            'admins' => $admins
        ]);
    }

    public function store(){
        return view('admin.storeadmin');
    }

    public function create(Request $rq){
        $admins = [
            'nama' => $rq->input('nama'),
            'email' => $rq->input('email'),
            'password' => $rq->input('password')
        ];

        admin::query()->create($admins);
        return redirect(route('admin.listadmin'));
    }

    public function detail($id){
        $admin =  admin::query()->where('id', $id)->first();
        return view('admin.detail');
    }

    public function showupdate($id){
        $admin =  admin::query()->where('id', $id)->first();
        return view('admin.updateadmin', [
            'admins' => $admin
        ]);
    }

    public function update(Request $rq, $id){
        $admins = [
            'nama' => $rq->input('nama'),
            'email' => $rq->input('email'),
            'password' => $rq->input('password')
        ];

        admin::query()->where('id', $id)->update($admins);
        return redirect(route('admin.listadmin'));
    }

    public function delete($id){
        $admin = admin::query()->where('id', $id)->delete();
        return redirect()->back();
    }
}
