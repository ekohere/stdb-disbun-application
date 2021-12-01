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


<!-- Panen Id Field -->
<div class="form-group">
    {!! Form::label('panen_id', 'Panen Id:') !!}
    <div class="position-relative">
        {!! Form::number('panen_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Spb Id Field -->
<div class="form-group">
    {!! Form::label('spb_id', 'Spb Id:') !!}
    <div class="position-relative">
        {!! Form::number('spb_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Penjualan Field -->
<div class="form-group">
    {!! Form::label('tgl_penjualan', 'Tgl Penjualan:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_penjualan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pot Susut Field -->
<div class="form-group">
    {!! Form::label('pot_susut', 'Pot Susut:') !!}
    <div class="position-relative">
        {!! Form::number('pot_susut', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pot Sortasi Field -->
<div class="form-group">
    {!! Form::label('pot_sortasi', 'Pot Sortasi:') !!}
    <div class="position-relative">
        {!! Form::number('pot_sortasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga Tbs Field -->
<div class="form-group">
    {!! Form::label('harga_tbs', 'Harga Tbs:') !!}
    <div class="position-relative">
        {!! Form::number('harga_tbs', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- File Upload Field -->
<div class="form-group">
    {!! Form::label('file_upload', 'File Upload:') !!}
    <div class="position-relative">
        {!! Form::text('file_upload', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('penjualanTbs.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

