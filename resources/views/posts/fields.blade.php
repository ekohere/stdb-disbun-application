<!-- Title Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Judul Bahasa Indonesia:') !!}
        <div class="position-relative">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Judul Bahasa Inggris:') !!}
        <div class="position-relative">
            {!! Form::text('title_english', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('image_caption', 'Judul Foto Bahasa Indonesia :') !!}
        <div class="position-relative">
            {!! Form::text('image_caption', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('image_caption', 'Judul Foto Bahasa Inggris :') !!}
        <div class="position-relative">
            {!! Form::text('image_caption_english', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Post Category Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('post_category_id', 'Kategori Post :') !!}
        <div class="position-relative">
            {!! Form::select('post_category_id',$postCategories, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('foto', 'Foto :') !!}
    <div class="position-relative">
        @if(!isset($post))
            <x-media-library-attachment  multiple name="media" rules="mimes:png,jpeg"/>
        @else
            <x-media-library-collection :model="$post"  name="media" rules="mimes:png,jpeg"/>
        @endif
    </div>
</div>

{{--@if(isset($post))
    <div class="form-group">
        <div class="position-relative">
            <img src="{!! asset($post->getFirstMediaUrl()) !!}" id="image-media" class="image-media">
        </div>
    </div>
@endif--}}


<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <div class="position-relative">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('content_english', 'Content English:') !!}
    <div class="position-relative">
        {!! Form::textarea('content_english', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Tanggal :') !!}
    <div class="position-relative">
        {!! Form::Date('created_at', isset($post)?$post->created_at->format('Y-m-d'):\Carbon\Carbon::today(), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Laravel Crop Image Before Upload using Cropper JS - NiceSnippets.com</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('posts.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

@section('css')
    /*<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css" integrity="sha512-jO9KUHlvIF4MH/OTiio0aaueQrD38zlvFde9JoEA+AQaCNxIJoX4Kjse3sO2kqly84wc6aCtdm9BIUpYdvFYoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />*/
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media-pro/styles.css')}}">

    <livewire:styles />
    <livewire:scripts />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
@endsection

@section('scripts')
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js" integrity="sha512-FHa4dxvEkSR0LOFH/iFH0iSqlYHf/iTwLc5Ws/1Su1W90X0qnxFxciJimoue/zyOA/+Qz/XQmmKqjbubAAzpkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>

<!--    <script type="module">
        /*import Cropper from './cropperjs';*/

        $('#image-media').on("click", function(e){
            const image = document.getElementById('image-media');
            const cropper = new Cropper(image, {
                aspectRatio: 16 / 9,
                crop(event) {
                    console.log(event.detail.x);
                    console.log(event.detail.y);
                    console.log(event.detail.width);
                    console.log(event.detail.height);
                    console.log(event.detail.rotate);
                    console.log(event.detail.scaleX);
                    console.log(event.detail.scaleY);
                },
            });
        });
    </script>-->

    <script  type="text/javascript">
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'content');
        },300);
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'content_english');
        },300);

    </script>
@endsection

