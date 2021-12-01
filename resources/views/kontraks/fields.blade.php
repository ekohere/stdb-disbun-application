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


<!-- Pks Id Field -->
<div class="form-group">
    {!! Form::label('pks_id', 'Pks Id:') !!}
    <div class="position-relative">
        {!! Form::number('pks_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga Id Field -->
<div class="form-group">
    {!! Form::label('harga_id', 'Harga Id:') !!}
    <div class="position-relative">
        {!! Form::number('harga_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Kontrak Field -->
<div class="form-group">
    {!! Form::label('nomor_kontrak', 'Nomor Kontrak:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_kontrak', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Kontrak Field -->
<div class="form-group">
    {!! Form::label('tgl_kontrak', 'Tgl Kontrak:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_kontrak', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Periode Kontrak Field -->
<div class="form-group">
    {!! Form::label('periode_kontrak', 'Periode Kontrak:') !!}
    <div class="position-relative">
        {!! Form::text('periode_kontrak', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Volume Field -->
<div class="form-group">
    {!! Form::label('volume', 'Volume:') !!}
    <div class="position-relative">
        {!! Form::number('volume', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga Aktual Field -->
<div class="form-group">
    {!! Form::label('harga_aktual', 'Harga Aktual:') !!}
    <div class="position-relative">
        {!! Form::number('harga_aktual', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- File Kontrak Field -->
<div class="form-group">
    {!! Form::label('file_kontrak', 'File Kontrak:') !!}
    <div class="position-relative">
        {!! Form::text('file_kontrak', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('kontraks.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

