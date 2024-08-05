<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTemplateController extends Controller
{
    function index() {
        return view('form.template', [
            'jadwal_list' => [
                [
                    'id_jadwal' => '0',
                    'nama' => 'asdad',

                ]
            ]
        ]);
    }

    function store(Request $request) {
        $jsonData = $request->input('json-data');
        return var_dump($jsonData);
    }
}
