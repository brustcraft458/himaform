<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTemplateController extends Controller
{
    function store(Request $request) {
        $request->session()->flash('action_message', json_encode($request->all()));

        return redirect()->route('form_template');
    }
}
