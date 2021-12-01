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


<!-- Periode Field -->
<div class="form-group">
    {!! Form::label('periode', 'Periode:') !!}
    <div class="position-relative">
        {!! Form::text('periode', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Kas Field -->
<div class="form-group">
    {!! Form::label('jml_kas', 'Jml Kas:') !!}
    <div class="position-relative">
        {!! Form::number('jml_kas', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Piutang Tahun Field -->
<div class="form-group">
    {!! Form::label('piutang_tahun', 'Piutang Tahun:') !!}
    <div class="position-relative">
        {!! Form::date('piutang_tahun', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jml Piutang Tahun Field -->
<div class="form-group">
    {!! Form::label('jml_piutang_tahun', 'Jml Piutang Tahun:') !!}
    <div class="position-relative">
        {!! Form::number('jml_piutang_tahun', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Simpanan Pokok Field -->
<div class="form-group">
    {!! Form::label('simpanan_pokok', 'Simpanan Pokok:') !!}
    <div class="position-relative">
        {!! Form::number('simpanan_pokok', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Simpanan Wajib Field -->
<div class="form-group">
    {!! Form::label('simpanan_wajib', 'Simpanan Wajib:') !!}
    <div class="position-relative">
        {!! Form::number('simpanan_wajib', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Laba Field -->
<div class="form-group">
    {!! Form::label('laba', 'Laba:') !!}
    <div class="position-relative">
        {!! Form::number('laba', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('neracaSimpanPinjams.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

