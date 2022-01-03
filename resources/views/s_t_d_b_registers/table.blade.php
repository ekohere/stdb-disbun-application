<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Users Pengaju</th>
        <th>Jumlah Persil</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($sTDBRegisters as $sTDBRegister)
        <tr>
            <td>{!! $no++ !!}</td>
            @if(!empty($sTDBRegister->anggota_id))
                <td>
                    Koperasi<br><span class="badge bg-green">{{$sTDBRegister->anggota->koperasi->nama_koperasi}}</span>
                    <hr class="border-1 mt-1 mb-0">
                    Nama Pengaju<br><span class="badge badge-blue">{{$sTDBRegister->anggota->nama_ktp}}</span>
{{--                    <hr class="border-1 mt-0 mb-0">--}}
                </td>
            @else
                <td>
                    Koperasi<br><span class="badge bg-red">Non Koperasi</span>
                    <hr class="border-1">
                    Nama Pengaju<br><span class="badge badge-blue">{{$sTDBRegister->users->name}}</span>
                    <hr class="border-1">
                </td>
            @endif
            <td>{!! $sTDBRegister->stdbDetailRegis->count() !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['sTDBRegisters.destroy', $sTDBRegister->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    @if($sTDBRegister->latest_status->id==1)
                        <a href="{!! route('sTDBRegisters.show', [$sTDBRegister->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Detail</a>
                    @elseif($sTDBRegister->latest_status->id==2)
                        <a href="{!! route('sTDBRegisters.print', [$sTDBRegister->id]) !!}" class="btn btn-sm btn-blue"><i class="fa fa-print"></i> Cetak Surat</a>
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
