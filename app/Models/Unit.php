<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\User;
use App\Models\UnitAudit;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "unit";
    // protected $editable

    // TODO users tipenya harus AUDITEE
    public function users(){ return $this->hasMany(User::class);}
    public function unit_audit(){ return $this->belongsTo(UnitAudit::class);}
}
