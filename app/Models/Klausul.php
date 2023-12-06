<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Standar;
use App\Models\SubKlausul;

class Klausul extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function standar(){ return $this->belongsTo(Standar::class);}
    public function sub_klausuls(){ return $this->hasMany(SubKlausul::class);}
}
