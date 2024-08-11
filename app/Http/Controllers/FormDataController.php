<?php

namespace App\Http\Controllers;

use App\Models\Dump;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    function index($id) {
        $data_list = Dump::all()->where('id_template', $id)->toArray();
        return dd($data_list);

        return view('form.data', [
            'data_list' => $data_list
        ]);
    }
}
