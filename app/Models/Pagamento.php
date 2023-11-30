<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'trapagam';
    protected $primaryKey = 'n_codipagam';
    public $timestamps = false;
    protected $fillable = [
                            'n_valopagam',
                            'n_vadipagam',
                            'c_descpagam',
                            'c_formpagam',
                            'c_bancpagam',
                            'n_codibanco',
                            'n_codicoord',
                            'n_codidivid',
                            'n_codiapart'
                        ];

    use HasFactory;
}
