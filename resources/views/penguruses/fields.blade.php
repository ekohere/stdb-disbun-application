<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Koperasi Id Field -->
<div class="form-group">
    {!! Form::label('koperasi_id', 'Koperasi Id:') !!}
    <div class="position-relative">
        {!! Form::number('koperasi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <div class="position-relative">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Golongan Field -->
<div class="form-group">
    {!! Form::label('golongan', 'Golongan:') !!}
    <div class="position-relative">
        {!! Form::text('golongan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jabatan Field -->
<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    <div class="position-relative">
        {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'Nik:') !!}
    <div class="position-relative">
        {!! Form::text('nik', null, ['class' => 'form-control']) !!}
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


<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <div class="position-relative">
        {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Masuk Field -->
<div class="form-group">
    {!! Form::label('tgl_masuk', 'Tgl Masuk:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_masuk', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Keluar Field -->
<div class="form-group">
    {!! Form::label('tgl_keluar', 'Tgl Keluar:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_keluar', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Status Kawin Field -->
<div class="form-group">
    {!! Form::label('status_kawin', 'Status Kawin:') !!}
    <div class="position-relative">
        {!! Form::text('status_kawin', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <div class="position-relative">
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('penguruses.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

