<?php

namespace Database\Seeders;

use App\Models\UnitAudit;
use App\Models\Billing;
use App\Models\Pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitAudits = UnitAudit::where('status', 'selesai')->get();
        foreach ($unitAudits as $i => $unitAudit) {
            $k = $i % 2;
            if ($k == 0) {
                $this->createBilling($unitAudit, 'lunas');
            } elseif ($k == 1) {
                $this->createBilling($unitAudit, 'belum lunas');
            }
        }
    }

    public function createBilling($unitAudit, $status)
    {
        $price = 15000000;

        $payments = fake()->randomElement([1, 2, 3, 5]);
        $paid = $status === 'lunas' ? $payments : ($payments - 1);
        echo $status . ' ' . $paid . ' ' . $payments . "\n";
        $sisa_tagihan = $status == 'lunas' ? 0 : ($price / $payments);
        $billing = Billing::create([
            'id_unit_audit' => $unitAudit->id,
            'nomor' => fake()->numerify('INV-######'),
            'file_invoice' => '',
            'total_tagihan' => $price,
            'sisa_tagihan' =>   $sisa_tagihan,
            'status' => $status
        ]);

        for ($i = 0; $i < $paid; $i++) {
            $this->createPembayaran($billing, ($price - $sisa_tagihan) / $payments);
        }

        return $billing;
    }

    public function createPembayaran($billing, $nominal)
    {
        return Pembayaran::create([
            'id_billing' => $billing->id,
            'nominal' => $nominal,
            'bukti_bayar' => '',
            'keterangan' => fake()->sentence()
        ]);
    }
}
