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


<!-- No Spb Field -->
<div class="form-group">
    {!! Form::label('no_spb', 'No Spb:') !!}
    <div class="position-relative">
        {!! Form::text('no_spb', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Spb Field -->
<div class="form-group">
    {!! Form::label('tgl_spb', 'Tgl Spb:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_spb', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Transport Id Field -->
<div class="form-group">
    {!! Form::label('transport_id', 'Transport Id:') !!}
    <div class="position-relative">
        {!! Form::number('transport_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Driver Id Field -->
<div class="form-group">
    {!! Form::label('driver_id', 'Driver Id:') !!}
    <div class="position-relative">
        {!! Form::number('driver_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pks Tujuan Field -->
<div class="form-group">
    {!! Form::label('pks_tujuan', 'Pks Tujuan:') !!}
    <div class="position-relative">
        {!! Form::number('pks_tujuan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Penerima Field -->
<div class="form-group">
    {!! Form::label('penerima', 'Penerima:') !!}
    <div class="position-relative">
        {!! Form::text('penerima', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pengangkut Field -->
<div class="form-group">
    {!! Form::label('pengangkut', 'Pengangkut:') !!}
    <div class="position-relative">
        {!! Form::text('pengangkut', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pengirim Field -->
<div class="form-group">
    {!! Form::label('pengirim', 'Pengirim:') !!}
    <div class="position-relative">
        {!! Form::text('pengirim', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jab Pengirim Field -->
<div class="form-group">
    {!! Form::label('jab_pengirim', 'Jab Pengirim:') !!}
    <div class="position-relative">
        {!! Form::text('jab_pengirim', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('spbs.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

