<!-- Name Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nama:') !!}
        <div class="position-relative">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>


    <!-- Parent Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', 'Kategori Agenda Parent:') !!}
        <div class="position-relative">
            {!! Form::select('parent_id',$agendaCategories, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::text('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('agendaCategories.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

