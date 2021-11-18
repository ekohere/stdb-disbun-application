<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Information Field -->
<div class="form-group">
    {!! Form::label('information', 'Information:') !!}
    <div class="position-relative">
        {!! Form::textarea('information', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jenis Pelayanan Id Field -->
<div class="form-group">
    {!! Form::label('jenis_pelayanan_id', 'Jenis Pelayanan:') !!}
    <div class="position-relative">
        {!! Form::select('jenis_pelayanan_id', $jenisPelayanan,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pelayanans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

