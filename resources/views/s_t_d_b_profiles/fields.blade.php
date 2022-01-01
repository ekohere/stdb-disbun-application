<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users Id:') !!}
    <div class="position-relative">
        {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
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


<!-- No Ktp Field -->
<div class="form-group">
    {!! Form::label('no_ktp', 'No Ktp:') !!}
    <div class="position-relative">
        {!! Form::text('no_ktp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <div class="position-relative">
        {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kecamatan Field -->
<div class="form-group">
    {!! Form::label('kecamatan', 'Kecamatan:') !!}
    <div class="position-relative">
        {!! Form::text('kecamatan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Desa Field -->
<div class="form-group">
    {!! Form::label('desa', 'Desa:') !!}
    <div class="position-relative">
        {!! Form::text('desa', null, ['class' => 'form-control']) !!}
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

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('sTDBProfiles.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

