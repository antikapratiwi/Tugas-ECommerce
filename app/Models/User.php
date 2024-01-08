<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\TimAuditor;
use App\Models\Unit;

class User extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "user";

    // TODO hanya bisa diakses kalo user tipe AUDITOR
    
    public function tim_auditor(){ return $this->belongsTo(TimAuditor::class);}
    // TODO hanya bisa diakses kalo user tipe AUDITEE
    public function unit(){ return $this->belongsTo(Unit::class);}
}
