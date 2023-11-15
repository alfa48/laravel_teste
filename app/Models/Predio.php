<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;
    protected $table = 'trapredi';
    protected $primaryKey = 'n_codipredi';
    public $timestamps = false;
    protected $fillable = [
                            'c_entrpredi',
                            'c_descpredi',
                            'n_codicaixa',
                            'n_codibloco',
                            'n_codicoord'
    ];
}
