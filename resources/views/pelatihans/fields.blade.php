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


<!-- Topik Field -->
<div class="form-group">
    {!! Form::label('topik', 'Topik:') !!}
    <div class="position-relative">
        {!! Form::text('topik', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Field -->
<div class="form-group">
    {!! Form::label('tgl', 'Tgl:') !!}
    <div class="position-relative">
        {!! Form::date('tgl', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- File Dok Field -->
<div class="form-group">
    {!! Form::label('file_dok', 'File Dok:') !!}
    <div class="position-relative">
        {!! Form::text('file_dok', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Peserta Field -->
<div class="form-group">
    {!! Form::label('jml_peserta', 'Jml Peserta:') !!}
    <div class="position-relative">
        {!! Form::number('jml_peserta', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pelaksana Field -->
<div class="form-group">
    {!! Form::label('pelaksana', 'Pelaksana:') !!}
    <div class="position-relative">
        {!! Form::text('pelaksana', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pelatihans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

