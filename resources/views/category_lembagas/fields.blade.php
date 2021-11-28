<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name_english', 'Name (English):') !!}
    <div class="position-relative">
        {!! Form::text('name_english', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Definition:') !!}
    <div class="position-relative">
        {!! Form::text('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <div class="position-relative">
        {!! Form::number('parent_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <div class="position-relative">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <div class="position-relative">
        {!! Form::number('order', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('categoryLembagas.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

