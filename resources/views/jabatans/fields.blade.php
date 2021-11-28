<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nama:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name_english', 'Nama (English):') !!}
    <div class="position-relative">
        {!! Form::text('name_english', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::text('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="skin skin-flat">
        <div class="position-relative">
            <fieldset>
                {!! Form::checkbox('show_in_header', 1, isset($jabatan)?$jabatan->show_in_header:false,['id'=>'input-show_in_parent_menu']) !!}
                <label for="input-show_in_header">Tampilkan Pada Header</label>
            </fieldset>
        </div>
    </div>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <div class="position-relative">
        {!! Form::number('order', isset($jabatan)?$jabatan->order:0, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('jabatan.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

