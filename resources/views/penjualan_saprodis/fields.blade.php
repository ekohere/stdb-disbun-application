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


<!-- Kode Anggota Field -->
<div class="form-group">
    {!! Form::label('kode_anggota', 'Kode Anggota:') !!}
    <div class="position-relative">
        {!! Form::text('kode_anggota', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Anggota Id Field -->
<div class="form-group">
    {!! Form::label('anggota_id', 'Anggota Id:') !!}
    <div class="position-relative">
        {!! Form::number('anggota_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <div class="position-relative">
        {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- No Nota Field -->
<div class="form-group">
    {!! Form::label('no_nota', 'No Nota:') !!}
    <div class="position-relative">
        {!! Form::text('no_nota', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pembiayaan Field -->
<div class="form-group">
    {!! Form::label('pembiayaan', 'Pembiayaan:') !!}
    <div class="position-relative">
        {!! Form::text('pembiayaan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Ket Field -->
<div class="form-group">
    {!! Form::label('ket', 'Ket:') !!}
    <div class="position-relative">
        {!! Form::textarea('ket', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('penjualanSaprodis.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

