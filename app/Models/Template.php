<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'tbl_template';

    protected $fillable = [
        'title',
        'visibility',
        'id_user',
        'id_department'
    ];

    public function section_list() {
        return $this->hasMany(Section::class, 'id_template');
    }
}
