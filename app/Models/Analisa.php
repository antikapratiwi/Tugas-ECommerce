<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\SubKlausul;

class Analisa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // asdasdhasdasdas
    

    // ORM RELATIONSHIPS

    public function sub_klausul_audit(){ return $this->belongsTo(SubKlausul::class);}
}
