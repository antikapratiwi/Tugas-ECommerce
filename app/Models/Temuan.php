<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Analisa;
use App\Models\ResponTemuan;

class Temuan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function analisa(){ return $this->belongsTo(Analisa::class);}
    public function respon_temuan(){ return $this->hasOne(ResponTemuan::class);}
}
