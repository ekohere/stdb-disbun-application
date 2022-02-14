<div class="modal fade text-left" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="editProfil"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title font-medium-1 text-text-bold-700 black" id="myModalLabel33">Perubahan Data Akun</label>
                <button type="button" class="close danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x"></i></span>
                </button>
            </div>
            <div class="card-body">
                {!! Form::model($user, ['url' => 'updateProfile/'.$user->id, 'method' => 'patch','class'=>'form form-horizontal','files' => true]) !!}
                    <div class="form-body">
                        <div class="text-center mb-3">
{{--                            <img src="{{ asset('master/app-assets/images/gallery/user_profil.png') }}" class="img-fluid rounded width-120"><br>--}}

                            <div v-if="foto.length > 0">
                                <img id="logo_review" :src="foto" alt="your image" class="height-200 rounded"/>
                            </div>
                            <div v-else>
                                <img id="logo_review" src="{{asset($user->avatar)}}" alt="your image" class="height-200 rounded"/>
                            </div>
                            <div class="mt-1">
                                <input id="avatar" type="file" name="avatar" accept="image/*" @change="previewFoto">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <!-- Name Field -->
                                <div class="form-group">
                                    {!! Form::label('name', 'Nama Lengkap',['class'=>' text-uppercase']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black']) !!}
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- No Hp Field -->
                                <div class="form-group">
                                    {!! Form::label('kontak', 'No Hp/Kontak',['class'=>' text-uppercase']) !!}
                                    {!! Form::number('kontak', null, ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black']) !!}
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Email Field -->
                                <div class="form-group">
                                    {!! Form::label('email', 'Email Aktif',['class'=>' text-uppercase']) !!}
                                    {!! Form::email('email', null, ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black']) !!}
                                </div>
                            </div>
                            <div class="col-6">
                                {!! Form::label('desa_id', 'Desa/Kelurahan',['class'=>'text-uppercase']) !!}
                                <select class="form-control border-left-pink border-left-6 text-bold-600 black" name="desa_id" id="desa_id">
                                    @foreach($desa as $item)
                                        <option value="{{ $item->id }}"
                                                @if($user['desa_id'] == $item->id)
                                                selected
                                            @endif
                                        >{{ $item->nama_desa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <!-- Alamat Field -->
                                <div class="form-group">
                                    {!! Form::label('alamat', 'Alamat Lengkap',['class'=>' text-uppercase']) !!}
                                    {!! Form::textarea('alamat', null, ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black','rows'=>'3','maxlength'=>'255']) !!}
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div id="heading1" class="card-header p-1 rounded-2 border-left-6 border-left-green box-shadow-0-1 cursor-pointer" role="tab" data-toggle="collapse" data-parent="#accordionWrapa1" href="#steap1">
                                        <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#steap1" aria-expanded="false" aria-controls="accordion1" class="font-small-3 text-bold-800 black text-uppercase">
                                            <i class="fa fa-gears green mr-1"></i> Pengaturan Kata Sandi
                                        </a>
                                    </div>
                                    <div id="steap1" role="tabpanel" aria-labelledby="heading1" class="collapse">
                                        <div class="card-content">
                                            <div class="card-body rounded-0-5">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        {!! Form::label('current_password', 'Password Lama',['class'=>' text-uppercase']) !!}
                                                        <div class="position-relative has-icon-right">
                                                            {!! Form::password('current_password', ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                            <div class="form-control-position">
                                                                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#current_password"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        {!! Form::label('password', 'Password Baru',['class'=>' text-uppercase']) !!}
                                                        <div class="position-relative has-icon-right">
                                                            {!! Form::password('password', ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                            <div class="form-control-position">
                                                                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        {!! Form::label('password_confirmation', 'Konfirmasi Password Baru',['class'=>' text-uppercase']) !!}
                                                        <div class="position-relative has-icon-right">
                                                            {!! Form::password('password_confirmation', ['class' => 'form-control border-left-pink border-left-6 text-bold-600 black font-medium-2','autocomplete'=>'off']) !!}
                                                            <div class="form-control-position">
                                                                <i class="fa fa-eye font-medium-3 toggle-password" toggle="#password_confirmation"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="text-right">
                    {!! Form::submit('Simpan Perubahan', ['class' => 'btn btn-green rounded-2 btn-glow mr-1']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
