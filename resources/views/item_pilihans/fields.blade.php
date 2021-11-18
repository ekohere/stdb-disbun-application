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
        {!! Form::text('information', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Syarat Pelayanan Id Field -->
<div class="form-group">
    {!! Form::label('syarat_pelayanan_id', 'Syarat Pelayanan Id:') !!}
    <div class="position-relative">
        {!! Form::number('syarat_pelayanan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('itemPilihans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

