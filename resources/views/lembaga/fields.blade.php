<!-- Name Field -->
<div class="form-group">
    {!! Form::label('foto', 'Logo/Foto (Jika ada) :') !!}
    <div class="position-relative">
        @if(!isset($lembaga))
            <x-media-library-attachment  multiple name="media" rules="mimes:png,jpeg,pdf"/>
        @else
            <x-media-library-collection :model="$lembaga"  name="media" rules="mimes:png,jpeg,pdf"/>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Nama Lembaga (Indonesia):') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name_english', 'Nama Lembaga (English):') !!}
    <div class="position-relative">
        {!! Form::text('name_english', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('caption', 'Caption (Indonesia):') !!}
    <div class="position-relative">
        {!! Form::text('caption', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('caption_english', 'Caption (English):') !!}
    <div class="position-relative">
        {!! Form::text('caption_english', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Deskripsi (Indonesia):') !!}
    <div class="position-relative">
        {!! Form::textarea('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('definition_english', 'Deskripsi (English):') !!}
    <div class="position-relative">
        {!! Form::textarea('definition_english', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('website', 'Link Website Lembaga:') !!}
    <div class="position-relative">
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('category_lembaga_id', 'Kategori Lembaga:') !!}
    <div class="position-relative">
        {!! Form::select('category_lembaga_id',$categoryLembaga, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('parent_id', 'Parent Kategori:') !!}
    <div class="position-relative">
        {!! Form::select('parent_id',$parent ,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <div class="position-relative">
        {!! Form::number('order', isset($lembaga)?$lembaga->order:0, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="skin skin-flat">
    <div class="position-relative">
        <fieldset>
            {!! Form::checkbox('show_in_parent_menu', 1, isset($lembaga)?$lembaga->show_in_parent_menu:false,['id'=>'input-show_in_parent_menu']) !!}
            <label for="input-show_in_parent_menu">Tampilkan Sebagai Parent Menu</label>
        </fieldset>
    </div>
    </div>
</div>

<div class="form-group">
    <div class="skin skin-flat">
    <div class="position-relative">
        <fieldset>
            {!! Form::checkbox('show_in_content', 1, isset($lembaga)?$lembaga->show_in_content:false,['id'=>'input-show_in_content']) !!}
            <label for="input-show_in_content">Tampilkan Dalam Konten Beranda</label>
        </fieldset>
    </div>
    </div>
</div>

<div class="form-group">
    <div class="skin skin-flat">
    <div class="position-relative">
        <fieldset>
            {!! Form::checkbox('show_in_first_menu', 1, isset($lembaga)?$lembaga->show_in_first_menu:false,['id'=>'input-show_in_first_menu']) !!}
            <label for="input-show_in_first_menu">Tampilkan Menu Pertama Setelah Beranda</label>
        </fieldset>
    </div>
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('lembaga.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

@section('scripts')

    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
    <script  type="text/javascript">
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace('definition');
            CKEDITOR.replace('definition_english');
        },300);
    </script>


@endsection
