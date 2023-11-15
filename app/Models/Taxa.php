<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxa extends Model
{
    use HasFactory;
    protected $table = 'trataxa';
    protected $primaryKey = 'n_coditaxa';
    public $timestamps = false;
    protected $fillable = [
                            'c_desctaxa',
                            'n_valotaxa',
                            'n_vmultaxa',
                            'n_permtaxa',
                            'c_freqtaxa',
                            'n_praztaxa',
                            'n_codicoord',
                            'd_denvtaxa',
                            'n_diaetaxa'
    ];
}
