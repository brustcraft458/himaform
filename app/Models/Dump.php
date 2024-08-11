<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dump extends Model
{
    use HasFactory;

    protected $table = 'tbl_dumps';

    protected $fillable = [
        'id_template'
    ];

    static function allCombinedData($id) {
        $label_list = [];
        $dump_list = Dump::where('id_template', $id)->get()->toArray();

        foreach ($dump_list as &$dump) {
            $data_list = Data::select('id', 'id_section', 'value')->where('id_dump', $dump['id'])->get()->toArray();

            foreach ($data_list as &$data) {
                $section = Section::select('label', 'type')->find($data['id_section'])->toArray();

                // Label
                if (!in_array($section['label'], $label_list)) {
                    array_push($label_list, $section['label']);
                }

                // Set Data
                $data = array_merge($data, $section);
            }

            $dump['data_list'] = $data_list;
        }

        return [
            'label_list' => $label_list,
            'dump_list' => $dump_list
        ];
    }
}
