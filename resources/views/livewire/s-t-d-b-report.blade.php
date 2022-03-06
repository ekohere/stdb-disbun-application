<div>
    <div class="row col-sm-12">
        <div class="col-sm-6">
            {!! Form::label('tahun', 'Filter Tahun',['class'=>' text-uppercase']) !!}
            {!! Form::select('yearSelected', $year, 0, ['id'=>'yearSelected','class' => 'form-control border-left-blue border-left-6','wire:model'=>'yearSelected']) !!}
            @error('yearSelected') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-6">
            {!! Form::label('bulan', 'Filter Bulan',['class'=>' text-uppercase']) !!}
            {!! Form::select('monthSelected', $month, 0, ['id'=>'monthSelected','class' => 'form-control border-left-blue border-left-6','wire:model'=>'monthSelected']) !!}
            @error('monthSelected') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
{{--        <div class="col-sm-2">--}}
{{--            <button type="button" wire:click.prevent="filterSTDB()" class="btn btn-green">Filter</button>--}}
{{--        </div>--}}
    </div>

    <div class="row col-sm-12 mt-2">
        <div class="col-sm-12 mb-1">
            <table class="table table-striped table-bordered default">
                <colgroup>
                    <col class="col-xs-1">
                    <col class="col-xs-7">
                </colgroup>
                <thead>
                    <tr>
                        <th>Status STDB</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($status as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td><b>{!! $item->total !!}</b></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{asset('master/app-assets/js/britech/table-settings-britech.js')}}"></script>
