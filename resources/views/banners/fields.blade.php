<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('banner', 'Banner (Indonesia):') !!}
    <div class="position-relative">
        @if(!isset($banner))
            <x-media-library-attachment name="media" rules="mimes:png,jpeg"/>
        @else
            <x-media-library-collection max-items="1" :model="$banner"  name="media" rules="mimes:png,jpeg"/>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('banner', 'Banner (English):') !!}
    <div class="position-relative">
        @if(!isset($banner))
            <x-media-library-attachment name="media_english" rules="mimes:png,jpeg"/>
        @else
            <x-media-library-collection max-items="1" :model="$banner"  name="media_english" rules="mimes:png,jpeg"/>
        @endif
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
    <a href="{!! route('banners.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

