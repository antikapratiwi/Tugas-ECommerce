<?php

namespace App\Libraries;

use App\Models\UnitAudit;
use NumberFormatter;

class Helper
{
    public static function GetUnitAuditInSession($return_object = false)
    {
        $id_unit_audit = session('id_unit_audit', 0);
        $unit_audit = UnitAudit::find($id_unit_audit);

        if ($unit_audit === null) {
            return (
                $return_object ?
                null
                :
                "(belum dipilih)"
            );
        } else {
            return (
                $return_object ?
                $unit_audit
                :
                $unit_audit->periode->nama . ' - ' . $unit_audit->unit->nama
            );
        }
    }

    public function convertCurrency(String $number): string
    {
        $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($number, 'IDR');
    }
    public static function SetUnitAuditInSession($id_unit_audit)
    {
        session(['id_unit_audit' => $id_unit_audit]);

        if (session('id_unit_audit', 0) === 0) {
            // ERROR OCCURED
            return false;
        } else {
            return true;
        }
    }
}
