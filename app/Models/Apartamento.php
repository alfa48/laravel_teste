<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    protected $table = 'traapart';
    protected $primaryKey = 'n_codiapart';
    public $timestamps = false;
    protected $fillable = ['c_portapart',
                           'c_tipoapart',
                            'n_codiconta',
                            'n_codipredi',
                            'n_codimorad'
                        ];

    use HasFactory;
}
