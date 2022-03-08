<?php

namespace App\Controllers;

gunakan App\Models\User_model;
gunakan App\Models\CatatanPerjalanan_model;
gunakan Config\Services;

class CatatanPerjalanan extends BaseController
{
    function __construct()
    {
        Services::session();
    }

    indeks fungsi publik()
    {
        if (!Layanan::session()->get("nik")) {
            return redirect()->ke(base_url('/login'));
        }

        $data = [
            "userdata" => User_model::findByNIK(Layanan::session()->get("nik")),
            "catatan_perjalanan" => CatatanPerjalanan_model::getAll()
        ];

        $userdata = User_model::findByNIK(Layanan::session()->get("nik"));
        return view("catatan_perjalanan", $data);
    }
}