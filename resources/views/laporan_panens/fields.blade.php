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


<!-- Pekerja Id Field -->
<div class="form-group">
    {!! Form::label('pekerja_id', 'Pekerja Id:') !!}
    <div class="position-relative">
        {!! Form::number('pekerja_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Panen Field -->
<div class="form-group">
    {!! Form::label('kode_panen', 'Kode Panen:') !!}
    <div class="position-relative">
        {!! Form::text('kode_panen', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Persil Field -->
<div class="form-group">
    {!! Form::label('nomor_persil', 'Nomor Persil:') !!}
    <div class="position-relative">
        {!! Form::number('nomor_persil', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Panen Field -->
<div class="form-group">
    {!! Form::label('tgl_panen', 'Tgl Panen:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_panen', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Luas Field -->
<div class="form-group">
    {!! Form::label('luas', 'Luas:') !!}
    <div class="position-relative">
        {!! Form::number('luas', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Rotasi Field -->
<div class="form-group">
    {!! Form::label('rotasi', 'Rotasi:') !!}
    <div class="position-relative">
        {!! Form::number('rotasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Hk Field -->
<div class="form-group">
    {!! Form::label('hk', 'Hk:') !!}
    <div class="position-relative">
        {!! Form::number('hk', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Jjg Field -->
<div class="form-group">
    {!! Form::label('jml_jjg', 'Jml Jjg:') !!}
    <div class="position-relative">
        {!! Form::number('jml_jjg', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Berat Brondol Field -->
<div class="form-group">
    {!! Form::label('berat_brondol', 'Berat Brondol:') !!}
    <div class="position-relative">
        {!! Form::number('berat_brondol', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Berat Kirim Field -->
<div class="form-group">
    {!! Form::label('berat_kirim', 'Berat Kirim:') !!}
    <div class="position-relative">
        {!! Form::number('berat_kirim', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('laporanPanens.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

