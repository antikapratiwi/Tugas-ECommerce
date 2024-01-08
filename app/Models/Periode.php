<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\UnitAudit;

class Periode extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "periode";

    public function unit_audits(){ return $this->hasMany(UnitAudit::class, "id_periode");}
}
