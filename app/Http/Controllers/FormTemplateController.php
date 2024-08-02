<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTemplateController extends Controller
{
    function store(Request $request) {
        $request->session()->flash('action_message', json_encode($this->formParse($request->all())));

        return redirect()->route('form_template');
    }

    function formParse($form) {
        $pattern = '/^form_data_.+$/';
        $data = [];

        foreach ($form as $key => $value) {
            if (preg_match($pattern, $key)) {
                $newKey = substr($key, strlen('form_data_'));
                $newKey = str_replace('_', ' ', $newKey);

                array_push($data, [
                    "key" => $newKey,
                    "type" => $value
                ]);
            }
        }

        return $data;
    }
}
