<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request){

        if($request->method()== "GET") {
            return view("login");
        }

        $email = $request->input("email");
        $password = $request->input("password");
    
        $pengguna = Pengguna::query()
        ->where("email", $email)
        ->first();
        if($pengguna == null) {
            return redirect()->back()
            ->withErrors([
                "message" => "Email tidak ditemukan" 
            ]);
        }
        if(!Hash::check($password, $pengguna->password)) {
            return redirect()->back()
            ->withErrors([
                "message" => "password salah lek!" 
            ]);
        }

        if(!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("idPengguna", $pengguna->id);
        return redirect()->route("product.index");
    }

    function logout() {
        session()->flush();
        return redirect()->route("login");
    }
}
