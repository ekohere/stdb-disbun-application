<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Koperasi Id</th>
        <th>Kode Koperasi</th>
        <th>Kategori Pekerja Id</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Kategori Pekerja</th>
        <th>Golongan Status</th>
        <th>Nik</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>Alamat</th>
        <th>Tgl Masuk</th>
        <th>Tgl Keluar</th>
        <th>Status Kawin</th>
        <th>Jenis Kelamin</th>
        <th>Status</th>
        <th>File Sk</th>
        <th>Lampiran Lainnya</th>
        <th>Riwayat Pekerjaan</th>
        <th>Gaji Pokok</th>
        <th>Tj Jabatan</th>
        <th>Tj Konsumsi</th>
        <th>Tj Harian</th>
        <th>Bonus Target Lembur</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($karyawans as $karyawan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $karyawan->koperasi_id !!}</td>
            <td>{!! $karyawan->kode_koperasi !!}</td>
            <td>{!! $karyawan->kategori_pekerja_id !!}</td>
            <td>{!! $karyawan->nama !!}</td>
            <td>{!! $karyawan->jabatan !!}</td>
            <td>{!! $karyawan->kategori_pekerja !!}</td>
            <td>{!! $karyawan->golongan_status !!}</td>
            <td>{!! $karyawan->nik !!}</td>
            <td>{!! $karyawan->tempat_lahir !!}</td>
            <td>{!! $karyawan->tgl_lahir !!}</td>
            <td>{!! $karyawan->alamat !!}</td>
            <td>{!! $karyawan->tgl_masuk !!}</td>
            <td>{!! $karyawan->tgl_keluar !!}</td>
            <td>{!! $karyawan->status_kawin !!}</td>
            <td>{!! $karyawan->jenis_kelamin !!}</td>
            <td>{!! $karyawan->status !!}</td>
            <td>{!! $karyawan->file_sk !!}</td>
            <td>{!! $karyawan->lampiran_lainnya !!}</td>
            <td>{!! $karyawan->riwayat_pekerjaan !!}</td>
            <td>{!! $karyawan->gaji_pokok !!}</td>
            <td>{!! $karyawan->tj_jabatan !!}</td>
            <td>{!! $karyawan->tj_konsumsi !!}</td>
            <td>{!! $karyawan->tj_harian !!}</td>
            <td>{!! $karyawan->bonus_target_lembur !!}</td>
            <td>
                {!! Form::open(['route' => ['karyawans.destroy', $karyawan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('karyawans.show', [$karyawan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('karyawans.edit', [$karyawan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
