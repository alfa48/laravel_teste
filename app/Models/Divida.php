<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    use HasFactory;
    protected $table = 'tradivid';
    protected $primaryKey = 'n_codidivid';
    public $timestamps = false;
    protected $fillable = [
                            'c_descdivid',
                            'c_estadivid',
                            'n_valtdivid',
                            'n_vapedivid',
                            'n_vapadivid',
                            'n_prazdivid',
                            'n_vmuldivid',
                            'c_estadivid',
                            'd_dacrdivid',
                            'n_codicoord'
    ];
}