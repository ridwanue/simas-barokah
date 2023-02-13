<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
            <h3 class="box-title">Laporan Saldo Masuk Terbaru</h3>
            </div>
            
            <div class="box-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Saldo Masuk</th>
                </tr>

                @foreach ($laporanMasuk as $row)
                <tr>
                    <td>{{date('d - M - Y', strtotime($row->tanggal))}}</td>
                    <td>{{$row->keterangan}}</td>
                    <td>@currency($row->jumlah)</td>
                </tr>
               @endforeach

            </tbody></table>
            </div>
            
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
            <h3 class="box-title">Laporan Saldo Keluar Terbaru</h3>
            </div>
            
            <div class="box-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Saldo Keluar</th>
                </tr>

                @foreach ($laporanKeluar as $row)
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