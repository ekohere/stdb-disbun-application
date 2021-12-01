<!-- Koperasi Id Field -->
<div class="form-group">
    {!! Form::label('koperasi_id', 'Koperasi Id:') !!}
    <div class="position-relative">
        {!! Form::number('koperasi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Periode Bulan Field -->
<div class="form-group">
    {!! Form::label('periode_bulan', 'Periode Bulan:') !!}
    <div class="position-relative">
        {!! Form::number('periode_bulan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Periode Tahun Field -->
<div class="form-group">
    {!! Form::label('periode_tahun', 'Periode Tahun:') !!}
    <div class="position-relative">
        {!! Form::date('periode_tahun', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Karyawan Id Field -->
<div class="form-group">
    {!! Form::label('karyawan_id', 'Karyawan Id:') !!}
    <div class="position-relative">
        {!! Form::number('karyawan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Gaji Pokok Field -->
<div class="form-group">
    {!! Form::label('gaji_pokok', 'Gaji Pokok:') !!}
    <div class="position-relative">
        {!! Form::number('gaji_pokok', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tj Jabatan Field -->
<div class="form-group">
    {!! Form::label('tj_jabatan', 'Tj Jabatan:') !!}
    <div class="position-relative">
        {!! Form::number('tj_jabatan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tj Konsumsi Field -->
<div class="form-group">
    {!! Form::label('tj_konsumsi', 'Tj Konsumsi:') !!}
    <div class="position-relative">
        {!! Form::number('tj_konsumsi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tj Harian Field -->
<div class="form-group">
    {!! Form::label('tj_harian', 'Tj Harian:') !!}
    <div class="position-relative">
        {!! Form::number('tj_harian', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Bonus Target Lembur Field -->
<div class="form-group">
    {!! Form::label('bonus_target_lembur', 'Bonus Target Lembur:') !!}
    <div class="position-relative">
        {!! Form::number('bonus_target_lembur', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Potongan Pph 21 Field -->
<div class="form-group">
    {!! Form::label('potongan_pph_21', 'Potongan Pph 21:') !!}
    <div class="position-relative">
        {!! Form::number('potongan_pph_21', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Potongan Asuransi Field -->
<div class="form-group">
    {!! Form::label('potongan_asuransi', 'Potongan Asuransi:') !!}
    <div class="position-relative">
        {!! Form::number('potongan_asuransi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Potongan Bulan Lalu Field -->
<div class="form-group">
    {!! Form::label('potongan_bulan_lalu', 'Potongan Bulan Lalu:') !!}
    <div class="position-relative">
        {!! Form::number('potongan_bulan_lalu', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('gajiKaryawans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

