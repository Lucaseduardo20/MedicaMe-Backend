<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Remedios extends Model
{

    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
       'id', 'nome', 'horario', 'dia', 'descricao', 'key'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
