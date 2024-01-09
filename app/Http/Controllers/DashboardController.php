<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitAudit;
use App\Models\PutusanAudit;
use App\Models\Billing;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $counters = [
            [
                'icon' => 'cube',
                'color' => 'danger',
                'label' => 'Jumlah Unit',
                'value' => Unit::count(),
                'details' => 'Semua unit dalam sistem'
            ],
            [
                'icon' => 'clock',
                'color' => 'warning',
                'label' => 'Audit Berlangsung',
                'value' => UnitAudit::where('status', 'belum selesai')->count(),
                'details' => 'Semua audit berlangsung dalam sistem'
            ],
            [
                'icon' => 'check-decagram',
                'color' => 'success',
                'label' => 'Audit Selesai',
                'value' => UnitAudit::where('status', 'selesai')->count(),
                'details' => 'Semua audit selesai dalam sistem'
            ],
            [
                'icon' => 'certificate',
                'color' => 'info',
                'label' => 'Memenuhi Standar',
                'value' => round(PutusanAudit::where('mematuhi_standar', true)->count() / PutusanAudit::count() * 100).'%',
                'details' => 'Persentase audit memenuhi standar'
            ],
            [
                'icon' => 'receipt',
                'color' => 'danger',
                'label' => 'Jumlah Tagihan',
                'value' => Billing::count(),
                'details' => 'Semua tagihan dalam sistem'
            ],
            [
                'icon' => 'clock',
                'color' => 'warning',
                'label' => 'Tagihan Belum Lunas',
                'value' => Billing::where('status', 'lunas')->count(),
                'details' => 'Semua tagihan belum lunas dalam sistem'
            ],
            [
                'icon' => 'check-decagram',
                'color' => 'success',
                'label' => 'Tagihan Lunas',
                'value' => Billing::where('status', 'lunas')->count(),
                'details' => 'Semua tagihan lunas dalam sistem'
            ],
            [
                'icon' => 'cash',
                'color' => 'info',
                'label' => 'Jumlah Pembayaran',
                'value' => Pembayaran::count(),
                'details' => 'Semua pembayaran dalam sistem'
            ],
        ];

        return view('dashboard', compact('counters'));
    }
}
