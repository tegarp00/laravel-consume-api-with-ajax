<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::query()->get();

        return response()->json([
            "status" => true,
            "message" => "data berhasil didapatkan",
            "data" => $pengguna->makeHidden([
                'password'
            ]),
        ]);
    }

    public function show($id)
    {
        $pengguna = Pengguna::query()
            ->where("id", $id)
            ->first();
        if ($pengguna == null) {
            return response()->json([
                "status" => false,
                "message" => "pengguna tidak ditemukan",
                "code" => null,
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "data pengguna berhasil",
            "data" => [
                "nama" => $pengguna->nama,
                "email" => $pengguna->email,
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Pengguna::find($id);
        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "pengguna tidak ditemukan",
                "code" => 404,
            ]);
        }

        $user->update($request->all());

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => "Data user berhasil diperbarui"
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        if (!isset($payload['nama'])) {
            return response()->json([
                "status" => false,
                "message" => "Nama tidak valid",
                "code" => null,
            ]);
        }

        if (!isset($payload['email'])) {
            return response()->json([
                "status" => false,
                "message" => "Email tidak valid",
                "code" => null,
            ]);
        }

        if (!isset($payload['password'])) {
            return response()->json([
                "status" => false,
                "message" => "Password tidak valid",
                "code" => null,
            ]);
        }

        $pengguna = Pengguna::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "Data pengguna berhasil disimpan",
            "data" => $pengguna,
        ]);
    }

    public function destroy($id)
    {
        $user = Pengguna::find($id);
        if (!$user) {
            return response()->json([
                "status" => 404,
                "message" => "pengguna tidak ditemukan",
            ]);
        }

        $user->delete();

        return response()->json([
            "status" => 200,
            "message" => "Data pengguna berhasil dihapus",
        ]);
    }
}
