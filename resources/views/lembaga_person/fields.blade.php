<!-- Person Dewan Id Field -->
<div class="form-group">
    {!! Form::label('person_id', 'Dosen/Anggota:') !!}
    <div class="position-relative">
        {!! Form::select('person_id',$person, null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jabatan Dewan Id Field -->
<div class="form-group">
    {!! Form::label('jabatan_id', 'Jabatan :') !!}
    <div class="position-relative">
        {!! Form::select('jabatan_id',$jabatan, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <div class="position-relative">
        {!! Form::number('order', isset($lembagaPerson)?$lembagaPerson->order:0, ['class' => 'form-control']) !!}
    </div>
</div>

{{--@if($lembagaPerson->show_in_header)
    <div class="form-group">
        {!! Form::label('order_in_header', 'Order Pada Header:') !!}
        <div class="position-relative">
            {!! Form::number('order_in_header', isset($lembagaPerson)?$lembagaPerson->order_in_header:0, ['class' => 'form-control']) !!}
        </div>
    </div>
@endif--}}


{!! Form::hidden('lembaga_id', $lembaga->id) !!}

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('lembagaPerson.index',[$slug]) !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

