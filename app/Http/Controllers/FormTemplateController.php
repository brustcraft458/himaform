<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTemplateController extends Controller
{
    function store(Request $request) {
        $jsonData = $request->input('json-data');
        return var_dump($jsonData);
        //$request->session()->flash('action_message', print_r($jsonData));

        // return redirect()->route('form_template');
    }
}
