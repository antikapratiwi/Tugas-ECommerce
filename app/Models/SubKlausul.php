<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Klausul;

class SubKlausul extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "sub_klausul";

    public function klausul(){ return $this->belongsTo(Klausul::class);}
}
