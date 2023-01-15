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
                @endforeach

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
                @endforeach

            </tbody></table>
            </div>
            
        </div>
    </div>
</div>