<!-- Name Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nama (Indonesia):') !!}
        <div class="position-relative">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('name_english', 'Nama (English):') !!}
        <div class="position-relative">
            {!! Form::text('name_english', null, ['class' => 'form-control']) !!}
        </div>
    </div>


    <!-- Parent Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', 'Kategori Post Parent :') !!}
        <div class="position-relative">
            {!! Form::select('parent_id',$postCategories, null, ['placeholder'=>'','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('order', 'Order :') !!}
    <div class="position-relative">
        {!! Form::number('order', isset($postCategory)?$postCategory->order:0, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::text('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Slug Field -->
{{--<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <div class="position-relative">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
</div>--}}

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('postCategories.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

