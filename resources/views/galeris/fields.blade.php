<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <div class="position-relative">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('foto', 'Galeri Foto :') !!}
    <div class="position-relative">
        @if(!isset($galeri))
            <x-media-library-attachment  multiple name="media" rules="mimes:png,jpeg,pdf"/>
        @else
            <x-media-library-collection :model="$galeri"  name="media" rules="mimes:png,jpeg,pdf"/>
        @endif
    </div>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <div class="position-relative">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Event Date Field -->
<div class="form-group">
    {!! Form::label('event_date', 'Tanggal Kegiatan:') !!}
    <div class="position-relative">
        {!! Form::date('event_date', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('event_date', 'Foto Kegiatan:') !!}
    <div class="position-relative">
        <x-media-library-attachment multiple name="media" rules="mimes:png,jpeg,pdf"/>
    </div>
</div>


<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('galeris.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

