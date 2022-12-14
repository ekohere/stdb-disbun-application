<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Users Pemohon</th>
        <th>Status Pengajuan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($sTDBRegisters as $sTDBRegister)
        @foreach($sTDBRegister->listSTDBStatus as $listStatus)
            @if($listStatus->id!=2)
                <tr>
                    <td>{!! $no++ !!}</td>
                    @if(!empty($sTDBRegister->anggota_id))
                        <td>
                            Koperasi<br><span class="badge bg-green">{{$sTDBRegister->anggota->koperasi->nama_koperasi}}</span>
                            <hr class="border-1 mt-0-1 mb-0">
                            Nama Petani<br><span class="badge badge-blue">{{$sTDBRegister->anggota->nama_ktp}}</span>
                            <hr class="border-1 mt-0-1 mb-0">
                            Jumlah Persil: <b>{!! $sTDBRegister->stdbDetailRegis->count() !!} Lahan</b>
                        </td>
                    @else
                        <td>
                            Koperasi<br><span class="badge bg-red">Non Koperasi</span>
                            <hr class="border-1">
                            Nama Pengaju<br><span class="badge badge-blue">{{$sTDBRegister->users->name}}</span>
                            <hr class="border-1">
                        </td>
                    @endif
                    <td>
                        <div class="timeline">
                            <ul>
                                @foreach($sTDBRegister->listSTDBStatus as $item)
                                    <li>
                                        @if($item->id==1)
                                            <span class="bg-warning"><i class="fa fa-clock-o"></i> {{$item->name}}</span>
                                        @elseif($item->id==2)
                                            <span class="bg-green"><i class="fa fa-check-circle"></i> {{$item->name}}</span>
                                        @elseif($item->id==3)
                                            <span class="bg-alert"><i class="fa fa-close"></i> {{$item->name}}</span>
                                        @elseif($item->id==4)
                                            <span class="bg-info"><i class="fa fa-check"></i> {{$item->name}}</span>
                                        @elseif($item->id==5)
                                            <span class="bg-info"><i class="fa fa-check"></i> {{$item->name}}</span>
                                        @elseif($item->id==6)
                                            <span class="bg-info"><i class="fa fa-check"></i> {{$item->name}}</span>
                                        @endif
                                        <div>
                                            <h6 class="mt-0-1 mb-0 p-0 font-small-3 text-bold-700">{{$item->pivot->created_at->format('d M Y h:m:s')}}</h6>
                                            <h6 class="small mt-0 p-0">di review oleh: <b>{{!empty($item->stdbRegisHasStatus->users_id)?$item->stdbRegisHasStatus->user->name:"-"}}</b></h6>
                                            <h6 class="mt-1">
                                                Catatan: <b><i>{{!empty($item->stdbRegisHasStatus->message)?$item->stdbRegisHasStatus->message:"-"}}</i></b>
                                            </h6>
                                        </div>
                                        <hr class="m-0 p-0">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                    <td class="text-center">
                        {!! Form::open(['route' => ['sTDBRegisters.destroy', $sTDBRegister->id], 'method' => 'delete']) !!}
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{!! route('sTDBRegisters.show', [$sTDBRegister->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Detail</a>
                            @role('admin_disbun|operator|koordinator|koperasi|admin|non_koperasi')
                            @if($sTDBRegister->latest_status->id==2)
                                <a target="_blank" href="{!! route('sTDBRegisters.print', [$sTDBRegister->id]) !!}" class="btn btn-sm btn-blue"><i class="fa fa-print"></i> Cetak Surat</a>
                            @endif
                            @endrole
                        </div>
                        @if($sTDBRegister->latest_status->id==2 && !empty($sTDBRegister->getFirstMediaUrl('lampiran_peta_persil')))
                            <a href="{!! $sTDBRegister->getFirstMediaUrl('lampiran_peta_persil') !!}" class="btn btn-sm btn-blue m-0-1"><i class="fa fa-download"></i> Download Lampiran Map</a>
                        @endif
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endif
        @endforeach
    @endforeach
    </tbody>
</table>
