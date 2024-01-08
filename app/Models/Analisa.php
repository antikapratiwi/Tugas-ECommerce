<?php //zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\SubKlausulAudit;
use App\Models\Temuan;
use App\Models\AnalisaLanjutan;

class Analisa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = "analisa";

    // ORM RELATIONSHIPS

    public function sub_klausul_audit(){ return $this->belongsTo(SubKlausulAudit::class, "id_sub_klausul_audit");}
    public function temuan(){ return $this->hasOne(Temuan::class, "id_analisa");}
    public function analisa_lanjutan(){ return $this->hasOne(AnalisaLanjutan::class, "id_analisa");}
}
