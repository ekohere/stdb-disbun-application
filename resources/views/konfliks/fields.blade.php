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


<!-- Persil Id Field -->
<div class="form-group">
    {!! Form::label('persil_id', 'Persil Id:') !!}
    <div class="position-relative">
        {!! Form::number('persil_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Konflik Field -->
<div class="form-group">
    {!! Form::label('tgl_konflik', 'Tgl Konflik:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_konflik', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pihak Terlibat Field -->
<div class="form-group">
    {!! Form::label('pihak_terlibat', 'Pihak Terlibat:') !!}
    <div class="position-relative">
        {!! Form::text('pihak_terlibat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jenis Konflik Field -->
<div class="form-group">
    {!! Form::label('jenis_konflik', 'Jenis Konflik:') !!}
    <div class="position-relative">
        {!! Form::text('jenis_konflik', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Deskripsi Singkat Field -->
<div class="form-group">
    {!! Form::label('deskripsi_singkat', 'Deskripsi Singkat:') !!}
    <div class="position-relative">
        {!! Form::textarea('deskripsi_singkat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Penyelesaian Field -->
<div class="form-group">
    {!! Form::label('penyelesaian', 'Penyelesaian:') !!}
    <div class="position-relative">
        {!! Form::textarea('penyelesaian', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('konfliks.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

