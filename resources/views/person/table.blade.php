<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<div class=" table-responsive">
<table class="table table-hover table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr class="text-uppercase">
        <th>No.</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>NIP</th>
        <th>NIDN/NITK/Lainnya</th>
        <th>Alamat</th>
        <th><code>#</code></th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($persons as $item)
        <tr>
            <td class="text-center text-bold-600 black">{!! $no++ !!}</td>
            <td>
                <img src="{{ $item->getFirstMediaUrl('default','thumb') }}" alt="" class="height-70"><br>
                <span class="font-medium-1 text-bold-600 black">{!! $item->name !!}</span>
            </td>
            <td>{!! $item->categoryPerson->name !!}</td>
            <td>{!! $item->nip!!}</td>
            <td>{!! $item->nomor_registrasi!!}</td>
            <td>{!! $item->alamat!!}</td>
            <td>
                {!! Form::open(['route' => ['person.destroy', $item->id], 'method' => 'delete']) !!}
{{--                <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                    <a href="{!! route('personDewans.show', [$item->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
{{--                    <a href="{!! route('personDewans.edit', [$item->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>--}}
{{--                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
{{--                </div>--}}

                <div class="btn-group mr-1 mb-1">
                    <a href="{!! route('person.show', [$item->id]) !!}" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i></a>
                    <button type="button" class="btn btn-sm btn-danger btn-darken-1 dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="{!! route('person.edit', [$item->id]) !!}" class="dropdown-item"><i class="fa fa-pencil-square"></i> Perubahan</a>
                        {!! Form::button('<i class="fa fa-trash"></i> Hapus', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
