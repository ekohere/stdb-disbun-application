<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <div class="position-relative">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Unit Kph Field -->
<div class="form-group">
    {!! Form::label('unit_kph', 'Unit Kph:') !!}
    <div class="position-relative">
        {!! Form::text('unit_kph', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Polygon Id Field -->
<div class="form-group">
    {!! Form::label('polygon_id', 'Polygon Id:') !!}
    <div class="position-relative">
        {!! Form::number('polygon_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('kecamatan', 'Kecamatan') !!}
    <br>
    <input type="checkbox" name="checkAll" id="checkAll" /> <label for='all'>Check All</label>
    <br/>
    <br/>
    @foreach($kecamatan as $data)
        @if($s == 1)
            <div class="col-4">
                <label>
                    {!! Form::checkbox('kecamatan[]',$data->id, in_array($data->id, $kphKecamatan) ? true : false, ['class' => 'name']) !!} {{ $data->nama_kec }}
                </label>
            </div>
        @else
            <div class="col-4">
                <label>
                    {!! Form::checkbox('kecamatan[]',$data->id, false, ['class' => 'name']) !!} {{ $data->nama_kec }}
                </label>
            </div>
        @endif
    @endforeach
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('kPHS.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

