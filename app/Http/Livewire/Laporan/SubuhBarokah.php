<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use DB;
class SubuhBarokah extends Component
{
    public function mount(){
        $this->kas_masuk = DB::Table('kas_masuk')->where('jenis_donasi_id', 2)->sum('jumlah');
        $this->kas_keluar = DB::Table('kas_keluar')->where('jenis_donasi_id', 2)->sum('jumlah');
        $this->sisa_saldo =  $this->kas_masuk-$this->kas_keluar;

        $this->laporanMasuk = DB::table('kas_masuk')->where('jenis_donasi_id', 2)
                                    ->latest()
                                    ->take(15)
                                    ->get();
        $this->laporanKeluar = DB::table('kas_keluar')->where('jenis_donasi_id', 2)
                                    ->latest()
                                    ->take(15)
                                    ->get();
    }
    public function render()
    {
        return view('livewire.laporan.subuh-barokah');
    }
}
