{{--<!-- Role Id Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('role_id', 'Role Id:') !!}--}}
{{--    <div class="position-relative">--}}
{{--        {!! Form::number('role_id', null, ['class' => 'form-control']) !!}--}}
{{--    </div>--}}
{{--</div>--}}

<div class="row">
    <div class="col-6 form-group">
        {!! Form::label('name', 'Name:') !!}
        <div class="position-relative">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-6 form-group">
        {!! Form::label('email', 'Email:') !!}
        <div class="position-relative has-icon-left">
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            <div class="form-control-position">
                <i class="fa fa-envelope black"></i>
            </div>
        </div>
    </div>

    <div class="col-4 form-group">
        {!! Form::label('nik', 'NIK:') !!}
        <div class="position-relative">
            {!! Form::text('nik', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-4 form-group">
        {!! Form::label('kontak', 'Kontak:') !!}
        <div class="position-relative">
            {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-4 form-group">
        {!! Form::label('desa_id', 'Desa/kelurahan:') !!}
        <div class="position-relative">
            {!! Form::select('desa',$desa, null, ['class' => 'form-control','id'=>'desa']) !!}
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#desa').select2();
            });
        </script>
    @endsection

    <div class="col-6 form-group">
        {!! Form::label('password', 'Password:') !!}
        <div class="position-relative has-icon-left">
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <div class="form-control-position">
                <i class="fa fa-lock black"></i>
            </div>
        </div>
    </div>

    <div class="col-6 form-group">
        {!! Form::label('re-password', 'Re-Password:') !!}
        <div class="position-relative has-icon-left">
            {!! Form::password('re-password', ['class' => 'form-control']) !!}
            <div class="form-control-position">
                <i class="fa fa-lock black"></i>
            </div>
        </div>
    </div>

    <!-- Avatar Field -->
    <div class="col-12 form-group">
        {!! Form::label('avatar', 'Foto:') !!}
        <div class="position-relative">
            {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('users.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

