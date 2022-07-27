<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-responsive table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Role</th>
        <th>Akun Info</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($users as $user)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>
                {!! !empty($user->roles[0]['name'])?$user->roles[0]['display_name']:"-" !!} - {!! !empty($user->desa_id)?$user->desa->nama_desa:"-" !!}
            </td>
            <td>
                <img src="{{!empty($user->avatar)?asset($user->avatar):asset('image/blank_profile.png')}}" width="100px">
                <hr class="m-0-1">

                <div class="badge bg-success small mb-0-1"><i class="fa fa-user small"></i></div> {!! $user->name !!}<br>
                <div class="badge bg-primary small mb-0-1"><i class="fa fa-phone small"></i></div> {!! $user->kontak !!} |
                <div class="badge bg-info small mb-0-1"><i class="fa fa-envelope small"></i></div> {!! $user->email !!}<br>
                <div class="badge bg-pink bg-lighten-2 small mb-0-1"><i class="fa fa-map-marker small"></i></div> {!! !empty($user->desa_id)?$user->desa->nama_desa:"-" !!}<br>
            </td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('users.show', [$user->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
