<!-- Nama Perusahaan Field -->
<div class="form-group">
    {!! Form::label('nama_perusahaan', 'Nama Perusahaan:') !!}
    <div class="position-relative">
        {!! Form::text('nama_perusahaan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Mill Name Field -->
<div class="form-group">
    {!! Form::label('mill_name', 'Mill Name:') !!}
    <div class="position-relative">
        {!! Form::text('mill_name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Group Perusahaan Field -->
<div class="form-group">
    {!! Form::label('group_perusahaan', 'Group Perusahaan:') !!}
    <div class="position-relative">
        {!! Form::text('group_perusahaan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Pabrik Field -->
<div class="form-group">
    {!! Form::label('alamat_pabrik', 'Alamat Pabrik:') !!}
    <div class="position-relative">
        {!! Form::text('alamat_pabrik', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Koordinat X Field -->
<div class="form-group">
    {!! Form::label('koordinat_x', 'Koordinat X:') !!}
    <div class="position-relative">
        {!! Form::text('koordinat_x', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Koordinat Y Field -->
<div class="form-group">
    {!! Form::label('koordinat_y', 'Koordinat Y:') !!}
    <div class="position-relative">
        {!! Form::text('koordinat_y', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kapasitas Terpasang Field -->
<div class="form-group">
    {!! Form::label('kapasitas_terpasang', 'Kapasitas Terpasang:') !!}
    <div class="position-relative">
        {!! Form::number('kapasitas_terpasang', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kapasitas Olah Field -->
<div class="form-group">
    {!! Form::label('kapasitas_olah', 'Kapasitas Olah:') !!}
    <div class="position-relative">
        {!! Form::number('kapasitas_olah', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pks.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

