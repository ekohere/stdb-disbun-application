<div class="page" id="lampiran">
    <svg height="10" width="100%">
        <line x1="100%" y1="0" style="stroke:rgb(0,0,0);stroke-width:10"></line>
    </svg>
    <div class="col-sm-12 pl-5 mt-1 isi_surat center">
        <h5 class="isi_surat text-bold-700">Lampiran SHM Pemilik Kebun</h5>
        <br>
        @foreach($sTDBRegister->stdbDetailRegis as $item)
            @if(!empty($item->persil->getFirstMediaUrl('lampiran_shm')))
                <iframe class="mt-2" width="60%" src="{!! url(str_replace("http://stdb-disbun.kutaitimurkab.go.id",env('URL_KOMPILASI'),$item->persil->getFirstMediaUrl('lampiran_shm'))) !!}">
                <br>
            @else
                <img class="mt-2" width="60%" src="{!! asset('image/example-shm.jpeg') !!}">
                <br>
            @endif
        @endforeach
        <h5 class="isi_surat text-bold-700 mt-3">Lampiran KTP</h5>
        @if($sTDBRegister->anggota->getFirstMediaUrl('lampiran_identitas'))
            <img width="40%" src="{!! asset(str_replace("http://stdb-disbun.kutaitimurkab.go.id",env('URL_KOMPILASI'),$sTDBRegister->anggota->getFirstMediaUrl('lampiran_identitas'))) !!}">
        @else
            <img width="40%" src="{!! asset('image/example-ktp.jpeg') !!}">
        @endif
    </div>
</div>
