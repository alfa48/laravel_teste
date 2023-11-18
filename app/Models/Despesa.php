<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;
    protected $table = 'tradespesa';
    protected $primaryKey = 'n_codidespe';
    public $timestamps = false;
    protected $fillable = [
                            'n_codicoord',
                            'n_valodespe',
                            'c_fontdespe',
                            'd_dasadespe'
    ];
}
