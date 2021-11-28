<!-- Name Field -->
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Nama:') !!}
        <div class="position-relative">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('name_english', 'Nama (English):') !!}
        <div class="position-relative">
            {!! Form::text('name_english', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('url', 'Url:') !!}
        <div class="position-relative">
            {!! Form::text('url', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-5">
        {!! Form::label('parent_id', 'Parent:') !!}
        <div class="position-relative">
            {!! Form::select('parent_id', $pageCategories ,null, ['placeholder' =>"",'class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Definition Field -->
    <div class="form-group col-sm-5">
        {!! Form::label('definition', 'Keterangan:') !!}
        <div class="position-relative">
            {!! Form::text('definition', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-2">
        {!! Form::label('order', 'Order :') !!}
        <div class="position-relative">
            {!! Form::number('order', isset($pageCategory)?$pageCategory->order:0, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>






<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pageCategories.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

