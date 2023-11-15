<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    use HasFactory;
    protected $table = 'tracaixa';
    protected $primaryKey = 'n_codicaixa';
    public $timestamps = false;
    protected $fillable = [
                            'n_saldcaixa',
                            'c_nomeentid'
    ];
}
