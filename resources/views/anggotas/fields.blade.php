<!-- Kode Anggota Field -->
<div class="form-group">
    {!! Form::label('kode_anggota', 'Kode Anggota:') !!}
    <div class="position-relative">
        {!! Form::text('kode_anggota', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Koperasi Id Field -->
<div class="form-group">
    {!! Form::label('koperasi_id', 'Koperasi Id:') !!}
    <div class="position-relative">
        {!! Form::number('koperasi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Ktp Field -->
<div class="form-group">
    {!! Form::label('nama_ktp', 'Nama Ktp:') !!}
    <div class="position-relative">
        {!! Form::text('nama_ktp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Ktp Field -->
<div class="form-group">
    {!! Form::label('nomor_ktp', 'Nomor Ktp:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_ktp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tempat Lahir Field -->
<div class="form-group">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    <div class="position-relative">
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Lahir Field -->
<div class="form-group">
    {!! Form::label('tgl_lahir', 'Tgl Lahir:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_lahir', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Ktp Field -->
<div class="form-group">
    {!! Form::label('alamat_ktp', 'Alamat Ktp:') !!}
    <div class="position-relative">
        {!! Form::text('alamat_ktp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Desa Ktp Field -->
<div class="form-group">
    {!! Form::label('alamat_desa_ktp', 'Alamat Desa Ktp:') !!}
    <div class="position-relative">
        {!! Form::text('alamat_desa_ktp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Kec Ktp Field -->
<div class="form-group">
    {!! Form::label('alamat_kec_ktp', 'Alamat Kec Ktp:') !!}
    <div class="position-relative">
        {!! Form::text('alamat_kec_ktp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jenis Kelamin Field -->
<div class="form-group">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <div class="position-relative">
        {!! Form::text('jenis_kelamin', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Status Dlm Keluarga Field -->
<div class="form-group">
    {!! Form::label('status_dlm_keluarga', 'Status Dlm Keluarga:') !!}
    <div class="position-relative">
        {!! Form::text('status_dlm_keluarga', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Anggota Keluarga Field -->
<div class="form-group">
    {!! Form::label('jml_anggota_keluarga', 'Jml Anggota Keluarga:') !!}
    <div class="position-relative">
        {!! Form::number('jml_anggota_keluarga', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pendidikan Terakhir Field -->
<div class="form-group">
    {!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir:') !!}
    <div class="position-relative">
        {!! Form::text('pendidikan_terakhir', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pekerjaan Lain Field -->
<div class="form-group">
    {!! Form::label('pekerjaan_lain', 'Pekerjaan Lain:') !!}
    <div class="position-relative">
        {!! Form::text('pekerjaan_lain', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Lampiran Identitas Field -->
<div class="form-group">
    {!! Form::label('lampiran_identitas', 'Lampiran Identitas:') !!}
    <div class="position-relative">
        {!! Form::text('lampiran_identitas', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Lampiran Foto Anggota Field -->
<div class="form-group">
    {!! Form::label('lampiran_foto_anggota', 'Lampiran Foto Anggota:') !!}
    <div class="position-relative">
        {!! Form::text('lampiran_foto_anggota', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Status Anggota Field -->
<div class="form-group">
    {!! Form::label('status_anggota', 'Status Anggota:') !!}
    <div class="position-relative">
        {!! Form::text('status_anggota', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('anggotas.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

