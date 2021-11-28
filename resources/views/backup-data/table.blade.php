<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Nama File</th>
        <th>Download</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($files as $file)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $file !!}</td>
            <td>
                <a href="{!! asset('storage/'.$file) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Download</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
