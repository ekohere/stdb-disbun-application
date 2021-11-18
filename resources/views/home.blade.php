@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card rounded-1 bg-warning bg-lighten-3">
        <div class="card-body">
            <div class="font-medium-4 text-bold-700 brown darken-4"><i class="fa fa-laptop font-large-2"></i> Welcome to Template Base Laravel</div>
        </div>
    </div>
    <div class="card rounded-1 box-shadow-1">
        <div class="card-body">
            <div class="font-medium-4 text-bold-700 black">Example Table</div>
            <div class="font-medium-1 text-bold-500 black mb-2">Contoh design table di laravel</div>
            <table class="table table-hover table-bordered table-striped default">
                <thead>
                <tr>
                    <th><code>#</code></th>
                    <th>Nama</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jack Ma</td>
                        <td>Lorem Ipsum Google Form</td>
                        <td>jack.ma@gmail.com</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="" class="btn btn-sm btn-green"><i class="fa fa-eye"></i></a>
                                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('master/app-assets/js/britech/table-settings-britech.js')}}"></script>
@endsection
