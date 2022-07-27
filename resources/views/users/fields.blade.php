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
        {!! Form::label('desa_id', 'Alamat Desa/kelurahan:') !!}
        <div class="position-relative">
            {!! Form::select('desa_id',$desa, null, ['class' => 'form-control','id'=>'desa', 'placeholder'=>'pilih desa']) !!}
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#desa').select2();
            });
        </script>
    @endsection

    <div class="col-4 form-group">
        {!! Form::label('alamat', 'Alamat/Kantor:') !!}
        <div class="position-relative">
            {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-4 form-group">
        {!! Form::label('password', 'Password:') !!}
        <div class="position-relative has-icon-left">
            {!! Form::password('password', ['class' => 'form-control','id'=>"password-field"]) !!}
            <div class="form-control-position">
                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password-field"></i>
            </div>
        </div>
    </div>

    <div class="col-4 form-group">
        {!! Form::label('re-password', 'Re-Password:') !!}
        <div class="position-relative has-icon-left">
            {!! Form::password('re-password', ['class' => 'form-control','id'=>"password-field"]) !!}
            <div class="form-control-position">
                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password-field"></i>
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

    <div class="col-12 form-group">
        {!! Form::label('role_id', 'Hak Akses:') !!}
        <div class="position-relative">
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control','id'=>'role_id', 'placeholder'=>'pilih hak akses']) !!}
        </div>
    </div>

    <div id="kph" class="col-12 form-group">
        {!! Form::label('kph_id', 'KPH:') !!}
        <div class="position-relative">
            {!! Form::select('kph_id', $kph, null, ['class' => 'form-control', 'placeholder'=>'pilih kph']) !!}
        </div>
    </div>
</div>

{{--<div class="card bg-grey bg-lighten-4 rounded-2">--}}
{{--    <div class="d-flex pt-1 pb-1">--}}
{{--        {!! Form::label('s_role_id', 'Hak Akses Diberikan',['class' => 'col-md-3 label-control text-uppercase mb-0']) !!}--}}
{{--        <div class="skin skin-flat">--}}
{{--            @foreach($sRoles as $item)--}}
{{--                <fieldset>--}}
{{--                    {!! Form::radio('s_role_id[]', $item->id, in_array($item->id, $roles)?true:false,['id'=>'input-'.$item->id]) !!}--}}
{{--                    <label for="input-{{$item->id}}" class="ml-1 text-bold-700 black text-uppercase">{!! $item->name !!} - {!! $item->display_name !!}</label>--}}
{{--                </fieldset>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('users.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#kph").hide('fast');
    });
    $('#role_id').on('change', function () {
        var role = this.value;
        console.info(role);
        if (role==8){
            $("#kph").show('slow');
        }else {
            $("#kph").hide('slow');
        }
    });
</script>
<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
