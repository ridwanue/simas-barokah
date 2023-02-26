<div wire:ignore class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Pengeluaran Terakhir</h3>
            </div>
            
            <div class="box-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th style="width: 30px">Tanggal Dikeluarkan</th>
                    <th style="width: 30px">Keperluan</th>
                    <th style="width: 60px">Saldo Keluar</th>
                </tr>
                @foreach ($saldo_keluar as $row)
                <tr>
                    <td>{{date('d - M - Y', strtotime($row->tanggal))}}</td>
                    <td>{{$row->keperluan}}</td>
                    <td>@currency($row->jumlah)</td>
                    
                </tr>
                <?php 
                        $total_saldo_keluar += $row->jumlah;
                    ?>
                @endforeach
                <tr>
                    <th colspan="2" style="font-size: 14px;">TOTAL</th>
                    <th style="font-size: 14px;">@currency($total_saldo_keluar)</th>
                </tr>
            </tbody></table>
            </div>
            
        </div>
    </div>
</div>

<div wire:ignore class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Warga Pendaftar</h3>
            </div>
            
            <div class="box-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 30px">Warga</th>
                    <th style="width: 30px">Total Daftar</th>
                    <th style="width: 60px">Saldo Masuk</th>
                    <th style="width: 40px">Action</th>
                </tr>
                @foreach ($pendaftar_aktif as $index => $row)
                <tr>
                    <td>{{++$index}}.</td>
                    <td>{{$row->rt}}</td>
                    <td><span class="badge bg-green">{{$row->jumlah_data}} Pendaftar</span></td>
                    <td>@currency($row->total_kas_masuk)</td>
                    <td>
                        <button wire:click="lihat('{{ addslashes($row->rt) }}', 'example')" type="button" class="btn btn-sm bg-primary"><i class="fa fa-eye"></i> Lihat</button>
                    </td>
                </tr>
                <?php 
                        $total_pendaftar_aktif += $row->total_kas_masuk;
                        $total_pendaftar += $row->jumlah_data;
                    ?>
                @endforeach
                <tr>
                    <th colspan="2" style="font-size: 14px;">TOTAL</th>
                    <th style="font-size: 14px;">{{$total_pendaftar}} Pendaftar</th>
                    <th style="font-size: 14px;">@currency($total_pendaftar_aktif)</th>
                    <th>Action</th>
                </tr>
            </tbody></table>
            </div>
            
        </div>
    </div>
</div>
<br>