<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspPublico extends Model
{
    protected $connection = 'mysql_second';
    protected $table = 'comepubl';
    protected $primaryKey = 'n_codiepubl';
    public $timestamps = false;
    protected $fillable =[
                            'c_descepubli',
                            'n_codibloco',
                            'n_codiender',
                            'n_codicaixa',
                            'n_precepubl'
                        ];
    use HasFactory;
}
