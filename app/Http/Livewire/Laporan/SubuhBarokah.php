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
    }
    public function render()
    {
        


        return view('livewire.laporan.subuh-barokah');
    }
}
