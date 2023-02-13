@if ($find=="lihat")
<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>{{$total_lunas}} Warga {{$rt}} Sudah Lunas</strong> | Saldo Masuk : @currency($total_lunas_rp)</h3>
            </div>
            
            <div class="box-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th >#</th>
                    <th >Warga</th>
                    <th >Saldo Masuk</th>
                    <th >Status</th>
                </tr>
                @foreach ($warga_lunas as $index => $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->nama}} - {{$item->rt}}</td>
                    <td>@currency($item->total_kas_masuk)</td>
                    <td><span class="badge bg-green">Sudah Lunas</span></td>
                </tr>
                @endforeach
            </tbody></table>
            </div>
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>{{$total_nunggak}} Warga {{$rt}} Belum Lunas</strong> | Saldo Masuk : @currency($total_nunggak_rp)</h3>
            </div>
            
            <div class="box-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th >#</th>
                    <th >Warga</th>
                    <th >Saldo Masuk</th>
                    <th >Status</th>
                </tr>
                
                @foreach ($warga_nunggak as $index => $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->nama}} - {{$item->rt}}</td>
                    <td>@currency($item->total_kas_masuk)</td>
                    <td><span class="badge bg-yellow">Belum Lunas</span></td>
                </tr>
                @endforeach
            </tbody></table>
            </div>
            
        </div>
    </div>
</div>
@endif