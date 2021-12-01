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


<!-- Kode Persil Field -->
<div class="form-group">
    {!! Form::label('kode_persil', 'Kode Persil:') !!}
    <div class="position-relative">
        {!! Form::text('kode_persil', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Persil Id Field -->
<div class="form-group">
    {!! Form::label('persil_id', 'Persil Id:') !!}
    <div class="position-relative">
        {!! Form::number('persil_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kategori Pemeliharaan Id Field -->
<div class="form-group">
    {!! Form::label('kategori_pemeliharaan_id', 'Kategori Pemeliharaan Id:') !!}
    <div class="position-relative">
        {!! Form::number('kategori_pemeliharaan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Luas Lahan Field -->
<div class="form-group">
    {!! Form::label('luas_lahan', 'Luas Lahan:') !!}
    <div class="position-relative">
        {!! Form::number('luas_lahan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Pelaksanaan Field -->
<div class="form-group">
    {!! Form::label('tgl_pelaksanaan', 'Tgl Pelaksanaan:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_pelaksanaan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Luas Dikerjakan Field -->
<div class="form-group">
    {!! Form::label('jml_luas_dikerjakan', 'Jml Luas Dikerjakan:') !!}
    <div class="position-relative">
        {!! Form::number('jml_luas_dikerjakan', null, ['class' => 'form-control']) !!}
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


<!-- Nilai Pekerja Field -->
<div class="form-group">
    {!! Form::label('nilai_pekerja', 'Nilai Pekerja:') !!}
    <div class="position-relative">
        {!! Form::number('nilai_pekerja', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Transport Field -->
<div class="form-group">
    {!! Form::label('jml_transport', 'Jml Transport:') !!}
    <div class="position-relative">
        {!! Form::number('jml_transport', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Cara Aplikasi Field -->
<div class="form-group">
    {!! Form::label('cara_aplikasi', 'Cara Aplikasi:') !!}
    <div class="position-relative">
        {!! Form::text('cara_aplikasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Mengunakan Apd Field -->
<div class="form-group">
    {!! Form::label('mengunakan_apd', 'Mengunakan Apd:') !!}
    <div class="position-relative">
        {!! Form::text('mengunakan_apd', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Ket Field -->
<div class="form-group">
    {!! Form::label('ket', 'Ket:') !!}
    <div class="position-relative">
        {!! Form::text('ket', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pemeliharaans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

