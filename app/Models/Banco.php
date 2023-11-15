<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    protected $table = 'trabanco';
    protected $primaryKey = 'n_codibanco';
    public $timestamps = false;
    protected $fillable = [
                            'c_entibanco',
                            'n_codientid',
                            'c_nomeentid',
                            'n_codicoord'
    ];
}
