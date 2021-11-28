<!-- Key Field -->
<div class="form-group">
    {!! Form::label('key', 'Key:') !!}
    <div class="position-relative">
        {!! Form::text('key', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <div class="position-relative">
        {{--            {!! Form::text('value', null, ['class' => 'form-control']) !!}--}}
        <input type="text" name="value_text" class="form-control">
    </div>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('file', 'Value File:') !!}
    <div class="position-relative">
        {{--        {!! Form::file('value_file', null, ['class' => 'form-control']) !!}--}}
        <input type="file" name="value_file" class="form-control">
    </div>
</div>

{{--<!-- Value Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('value', 'Value File:') !!}--}}
{{--    <div class="d-flex mb-2">--}}
{{--        <input name="tipe" type="radio" v-model="selected" value="value" @click="select()" id="value"/><label for="value" class="m-0 text-bold-700 font-medium-1 black" style="padding-left: 0.5em"> Upload</label><br>--}}
{{--        <input name="tipe" type="radio" v-model="selected" value="file" @click="select()" class="ml-2" id="file"/><label for="file" class="m-0 text-bold-700 font-medium-1 black" style="padding-left: 0.5em"> Youtube</label><br>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div v-show="selected === 'value'">--}}
{{--   --}}
{{--</div>--}}

{{--<div v-show="selected === 'file'">--}}
{{--    --}}
{{--</div>--}}

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('profiles.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

