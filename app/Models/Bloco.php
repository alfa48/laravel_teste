<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    use HasFactory;
    protected $table = 'trabloco';
    protected $primaryKey = 'n_codibloco';
    public $timestamps = false;
    protected $fillable = [
                            'c_descbloco',
                            'n_nprebloco',
                            'd_dacrbloco',
                            'n_codicoord',
                            'n_codicaixa',
                            'c_ruabloco',
                            'n_codicentr'];
}
