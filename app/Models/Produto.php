<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'imagem']; // protected pode ser usado apenas dentro do namespace que foi definido, ou seja, dentro do app/Models
}