<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tipe Syarat Id Field -->
<div class="form-group">
    {!! Form::label('tipe_syarat_id', 'Tipe Syarat:') !!}
    <div class="position-relative">
        {!! Form::select('tipe_syarat_id', $tipeSyarat,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>


<!-- Information Field -->
<div class="form-group">
    {!! Form::label('information', 'Information:') !!}
    <div class="position-relative">
        {!! Form::textarea('information', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Required Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('required', 'Required:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('required', false) !!}
        {!! Form::checkbox('required', '1', null) !!} 1
    </label>
</div>--}}

<!-- Pelayanan Id Field -->
{!! Form::hidden('pelayanan_id', $pelayanan->id, ['class' => 'form-control']) !!}



<!-- File Download Id Field -->
<div class="form-group">
    {!! Form::label('file_download_id', 'File Download:') !!}
    <div class="position-relative">
        {!! Form::select('file_download_id', $fileDownload,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('syaratPelayanans.index',['pelayanan_id'=>$pelayanan->id]) !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

