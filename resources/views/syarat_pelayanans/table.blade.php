<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Name</th>
        <th>Tipe Syarat</th>
        <th>Information</th>
        <th>File Download</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($syaratPelayanans as $syaratPelayanan)
        <tr @if($syaratPelayanan->trashed()) class="table-danger" @endif>
            <td>{!! $no++ !!}</td>
            <td>{!! $syaratPelayanan->name !!}</td>
            <td>{!! $syaratPelayanan->tipeSyarat->name !!}</td>
            <td>{!! $syaratPelayanan->information !!}</td>
            <td>{!! $syaratPelayanan->file_download_id !!}</td>
            <td>
                {!! Form::open(['route' => ['syaratPelayanans.destroy', $syaratPelayanan->id], 'method' => 'delete']) !!}
                {!! Form::hidden('pelayanan_id', $pelayanan->id, ['class' => 'form-control']) !!}
                @if(!$syaratPelayanan->trashed())
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('syaratPelayanans.show', [$syaratPelayanan->id,'pelayanan_id'=>$pelayanan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('syaratPelayanans.edit', [$syaratPelayanan->id,'pelayanan_id'=>$pelayanan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                @else
                    {!! Form::button('<i class="fa fa-undo"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info', 'onclick' => "return confirm('Mengembalikan data yang terhapus?')"]) !!}
                @endif
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
