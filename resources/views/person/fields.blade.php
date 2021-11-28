<div class="form-group">
    {!! Form::label('foto', 'Foto',['class'=> 'text-bold-600']) !!}
    <div class="position-relative">
        @if(!isset($person))
            <x-media-library-attachment name="media" rules="mimes:png,jpeg,pdf"/>
        @else
            <x-media-library-collection :model="$person" max-items="1"  name="media" rules="mimes:png,jpeg,pdf"/>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('foto_closeup', 'Foto Wajah (Khusus Untuk Direktur/Wadir) - Saran Ukuran P:L = 1:1',['class'=> 'text-bold-600']) !!}
    <div class="position-relative">
        @if(!isset($person))
            <x-media-library-attachment name="closeup" collection="closeup" rules="mimes:png,jpeg,pdf"/>
        @else
            <x-media-library-collection :model="$person" max-items="1"  name="closeup" collection="closeup" rules="mimes:png,jpeg,pdf"/>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <!-- Pendidikan Id Field -->
        <div class="form-group">
            {!! Form::label('name', 'Nama Lengkap (Tanpa Gelar)',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::text('name', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <!-- Pendidikan Id Field -->
        <div class="form-group">
            {!! Form::label('front_degree', 'Gelar Depan',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::text('front_degree',null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <!-- Daerah Pemilihan Id Field -->
        <div class="form-group">
            {!! Form::label('back_degree', 'Gelar Akhir',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::text('back_degree', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Address Field -->
        <div class="form-group">
            {!! Form::label('address', 'Alamat Lengkap',['class'=> 'text-bold-600']) !!}
                {!! Form::text('address', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <!-- Place Of Birth Field -->
        <div class="form-group">
            {!! Form::label('place_of_birth', 'Tempat Lahir',['class'=> 'text-bold-600']) !!}
            {!! Form::text('place_of_birth', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <!-- Date Of Birth Field -->
        <div class="form-group">
            {!! Form::label('date_of_birth', 'Tanggal Lahir',['class'=> 'text-bold-600']) !!}
            {!! Form::date('date_of_birth', (isset($person) && $person->date_of_birth ? $person->date_of_birth : date('Y-m-d')), ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
{{--            <input name="date_of_birth" id="date_of_birth" type="date" value="{{ isset($personDewan->date_of_birth) ? $personDewan->date_of_birth : '' }}" class="form-control rounded-2 font-medium-1 text-bold-600 black">--}}
        </div>
    </div>
    <div class="col-lg-3">
        <!-- Periode Id Field -->
        <div class="form-group">
            {!! Form::label('nip', 'Nomor Induk Pegawai (NIP)',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::text('nip', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <!-- Periode Id Field -->
        <div class="form-group">
            {!! Form::label('nomor_registrasi', 'NIDN/NITK/Nomor Registrasi Lainnya',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::text('nomor_registrasi', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <!-- Periode Id Field -->
        <div class="form-group">
            {!! Form::label('id_sdm_sister', 'ID SDM SISTER',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::text('id_sdm_sister', null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <!-- Periode Id Field -->
        <div class="form-group">
            {!! Form::label('category_person_id', 'Kategori',['class'=> 'text-bold-600']) !!}
            <div class="position-relative">
                {!! Form::select('category_person_id', $categoryPerson,null, ['class' => 'form-control rounded-2 font-medium-1 text-bold-600 black']) !!}
            </div>
        </div>
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('person.index') !!}" class="btn btn-secondary rounded-2"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1 rounded-2']) !!}
</div>

