<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use DB;
class KasKematian extends Component
{
    public $find, $warga_lunas, $warga_nunggak, $total_lunas, $total_nunggak;

    public function mount(){
        $this->saldo_keluar = DB::table('kas_keluar_kematian')
                                    ->latest()
                                    ->take(10)
                                    ->get();
                                    
        $this->jumlah_kas_masuk = DB::Table('iuran_kematian')->sum('jumlah');
        $this->jumlah_kas_keluar = DB::Table('kas_keluar_kematian')->sum('jumlah');
        $this->sisa_saldo = $this->jumlah_kas_masuk-$this->jumlah_kas_keluar;

        $this->pendaftar_aktif = DB::table('iuran_kematian')
                            ->select('rt', DB::raw('COUNT(*) AS jumlah_data'), DB::raw('SUM(jumlah) AS total_kas_masuk'))
                            ->join('data_warga', 'data_warga_id', '=', 'data_warga.id')
                            ->groupBy('rt')
                            ->get();

    }
    public function render()
    {
        

        return view('livewire.laporan.kas-kematian');
    }
    
    public function lihat($rt){
    $this->find = "lihat";
    if($this->find =="lihat"){
        $warga_lunas = DB::table('iuran_kematian')
            ->select('nama', 'rt', DB::raw('SUM(jumlah) as total_kas_masuk'))
            ->join('data_warga', 'data_warga_id', '=', 'data_warga.id')
            ->where('jumlah','>=','1562500')
            ->where('rt','=',$rt)
            ->groupBy('nama','rt')->get();

        $this->total_lunas = $warga_lunas->count();
        $this->total_lunas_rp = $warga_lunas->sum('total_kas_masuk');
        $this->warga_lunas = $warga_lunas;

        $warga_nunggak = DB::table('iuran_kematian')
            ->select('nama', 'rt', DB::raw('SUM(jumlah) as total_kas_masuk'))
            ->join('data_warga', 'data_warga_id', '=', 'data_warga.id')
            ->where('jumlah','<','1562500')
            ->where('rt','=',$rt)
            ->groupBy('nama','rt')->get();

        $this->total_nunggak = $warga_nunggak->count();
        $this->total_nunggak_rp = $warga_nunggak->sum('total_kas_masuk');

        $this->warga_nunggak = $warga_nunggak;
        
        }
    }
}
