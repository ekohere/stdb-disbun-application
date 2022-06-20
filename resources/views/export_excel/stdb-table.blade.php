<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th>Bulan</th>
        <th>Jumlah Petani Terdata</th>
        <th>Jumlah Persil</th>
        <th>Total Luasan Persil</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dataSTDB as $item)
        <tr>
            <td>{!! $item['Bulan'] !!}</td>
            <td>{!! $item['Jumlah Petani Terdata'] !!}</td>
            <td>{!! $item['Jumlah Persil'] !!}</td>
            <td>{!! $item['Total Luasan Persil'] !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
