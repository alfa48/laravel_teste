<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    protected $table = 'traconta';
    protected $primaryKey = 'n_codiconta';
    public $timestamps = false;
    protected $fillable = [
                            'n_saldconta',
                            'n_diviconta'
    ];
}
