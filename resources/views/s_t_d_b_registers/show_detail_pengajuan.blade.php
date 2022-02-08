<div class="card-content bg-gradient-striped-grey-blue rounded-1 box-shadow-1 mt-3 p-2">
    <span class="content-header-title mb-2 d-inline-block font-medium-4"><b>Detail Pengajuan STDB</b></span>

    <h5 class="text-bold-700 mb-1">A. Keterangan Pemilik Kebun</h5>
    <hr>
    <div class="row col-12 mb-3">
        <div class="col-6">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->nama_ktp}}</td>
                </tr>
                <tr>
                    <td>Tempat, tanggal lahir</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->tempat_lahir}}, {{date_format($sTDBRegister->anggota->tgl_lahir,'d M Y')}}</td>
                </tr>
                <tr>
                    <td>No. KTP</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->nomor_ktp}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->alamat_ktp}}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> 64 (Kalimantan TImur)</td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> 64.08 (Kutai Timur)</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->alamat_kec_ktp}}</td>
                </tr>
                <tr>
                    <td>Desa/Kelurahan</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->alamat_desa_ktp}}</td>
                </tr>
            </table>
        </div>

        <div class="col-6">
            <table>
                <tr>
                    <td>Jenis kelamin</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Status dalam rumah tangga</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->status_dlm_keluarga}}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {!! \Carbon\Carbon::today()->year - $sTDBRegister->anggota->tgl_lahir->format('Y') !!} Tahun</td>
                </tr>
                <tr>
                    <td>Jumlah anggota keluarga</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->jml_anggota_keluarga}}</td>
                </tr>
                <tr>
                    <td>Ijizah tertinggi yang dimiliki</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->pendidikan_terakhir}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan selain memiliki kebun</td>
                    <td>: </td>
                    <td class="pl-1 text-bold-700"> {{$sTDBRegister->anggota->pekerjaan_lain}}</td>
                </tr>
                <tr>
                    <td>Lampiran KTP</td>
                    <td>: </td>
                    @if(!empty($sTDBRegister->anggota->getFirstMediaUrl('lampiran_identitas')))
                        <td class="pl-1 text-bold-700">
                            <a href="{!! asset($sTDBRegister->anggota->getFirstMediaUrl('lampiran_identitas')) !!}">download disini</a>
                        </td>
                    @else
                        <td class="pl-1 text-bold-700">
                            <a href="#" onclick="alert('lampiran KTP masih dalam proses upload')">download disini</a>
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>

    <h5 class="text-bold-700 mb-1">B. Keterangan Kebun/Persil</h5>
    <hr>
    @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
        <h6 class="bg-green bg-lighten-2 text-bold-700 mb-1 text-uppercase p-0-1">Kebun/Persil Ke-{{$key+1}}</h6>
        <div class="row col-12 mb-3">
            <div class="col-8 m-0 p-0">
                <table>
                    <tr>
                        <td>Status kepimilikan lahan</td>
                        <td>:</td>
                        <td class="pl-1 text-bold-700">{{!empty($item->persil->status_lahan)?$item->persil->status_lahan:"Tidak diketahui"}}</td>
                    </tr>
                    <tr>
                        <td>No. surat lahan</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{!empty($item->persil->nomor_surat_lahan)?$item->persil->nomor_surat_lahan:"Tidak diketahui"}}</td>
                    </tr>
                    <tr>
                        <td>Lampiran surat lahan</td>
                        <td>: </td>
                        @if(!empty($item->persil->getFirstMediaUrl('lampiran_shm')))
                            <td class="pl-1 text-bold-700">
                                <a href="{!! asset($sTDBRegister->anggota->getFirstMediaUrl('lampiran_shm')) !!}">download disini</a>
                            </td>
                        @else
                            <td class="pl-1 text-bold-700">
                                <a href="#" onclick="alert('lampiran KTP masih dalam proses upload')">download disini</a>
                            </td>
                        @endif
                    </tr>

                    <tr>
                        <td>Jenis tanaman perkebunan</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{!empty($item->persil->jenis_tanaman)?$item->persil->jenis_tanaman:"Tidak diketahui"}}</td>
                    </tr>
                    <tr>
                        <td>Luas lahan ditanam telah produksi(m²)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->luas_lahan_tanam_telah_produksi}} m²</td>
                    </tr>
                    <tr>
                        <td>Luas lahan ditanam belum produksi(m²)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->luas_lahan_tanam_belum_produksi}} m²</td>
                    </tr>
                    <tr>
                        <td>Luas lahan belum ditanam(m²)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->luas_lahan_belum_tanam}} m²</td>
                    </tr>
                    <tr>
                        <td>Rata-rata jumlah panen dalam satu tahun(kali)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->rata_panen_tahun}} kali</td>
                    </tr>
                    <tr>
                        <td>Rata-rata produksi dalam satu kali panen(ton)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->rata_produksi_dalam_panen}} ton</td>
                    </tr>
                    <tr>
                        <td>Total produksi dalam satu tahun(ton)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->total_produksi_setahun}} ton</td>
                    </tr>
                    <tr>
                        <td>Produktifitas lahan(ton/Ha)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{{$item->persil->produktifitas_lahan}} ton/Ha</td>
                    </tr>
                    <tr>
                        <td>Rata-rata harga jual(Rp/Kg)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{ number_format($item->persil->rata_harga_jual_tbs,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Rata-rata harga jual(Rp/Kg)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{ number_format($item->persil->rata_harga_jual_tbs,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Penjualan pertahun(Rp)</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{ number_format($item->persil->total_penjualan_tbs_tahun,0,',','.') }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-4 m-0 p-0">
                <table>
                    <tr>
                        <td>Rata-rata umur tanaman</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->rata_umur_tanaman}}</td>
                    </tr>
                    <tr>
                        <td>Bulan tanam</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->bulan_tanam}} </td>
                    </tr>
                    <tr>
                        <td>Tahun tanam</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->tahun_tanam}} </td>
                    </tr>
                    <tr>
                        <td>Jumlah pohon</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->jml_pohon}} </td>
                    </tr>
                    <tr>
                        <td>Pola tanam</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->pola_tanam}} </td>
                    </tr>
                    <tr>
                        <td>Lahan gambut/non</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->laham_gambut_or_non}} </td>
                    </tr>
                    <tr>
                        <td>Kondisi topografi</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->topografi}} </td>
                    </tr>
                    <tr>
                        <td>Metode pembukaan lahan</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->metode_bukaan_lahan}} </td>
                    </tr>
                    <tr>
                        <td>Asal benih/bibit</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{!empty($item->persil->asal_benih)?$item->persil->asal_benih:"Distributor benih tak bersertifikat"}} </td>
                    </tr>
                    <tr>
                        <td>Jenis pupuk</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->jenis_pupuk}} </td>
                    </tr>
                    <tr>
                        <td>Mitra pengolahan</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">{!! !empty($item->persil->mitra_pengolahan)?implode(",",\GuzzleHttp\json_decode($item->persil->mitra_pengolahan)):"-" !!}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 mt-2 p-0">
                <h6 class="text-bold-700">Keterangan Pendudukung</h6>
                <hr class="mb-1 mt-0 p-0">
            </div>

            <div class="col-6 m-0 p-0">
                <table class="mb-1">
                    <tr>
                        <td>Pupuk + Upah</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{number_format($item->persil->pupuk_tambah_upah,0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td>Pestisida + Upah</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{number_format($item->persil->pestisida_tambah_upah,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Pembersihan kebun + Upah</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{number_format($item->persil->pembersihan_tambah_upah,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Panen + Upah</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{number_format($item->persil->panen_tambah_upah,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Pangeluaran lainnya</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{number_format($item->persil->biaya_lain,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Total biaya produksi</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700">Rp. {{ number_format($item->persil->total_biaya_produksi,0,',','.')}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-6 m-0 p-0">
                <table class="mb-1">
                    <tr>
                        <td>Apakah kesulitan menjual hasil kebun</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->apakah_kesulitan_menjual}}</td>
                    </tr>
                    <tr>
                        @if($item->persil->jenis_kesulitan=="Lainnya")
                            <td>Jenis kesulitan lainnya</td>
                            <td>: </td>
                            <td class="pl-1 text-bold-700"> {{$item->persil->kesulitan_lainnya}}</td>
                        @else
                            <td>Kesulitan lainnya</td>
                            <td>: </td>
                            <td class="pl-1 text-bold-700"> {{$item->persil->jenis_kesulitan}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Penentuan harga jual</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->penentuan_harga_jual}}</td>
                    </tr>
                    <tr>
                        <td>Lahan yang perlu diremajakan</td>
                        <td>: </td>
                        <td class="pl-1 text-bold-700"> {{$item->persil->lahan_yg_perlu_diremajakan}}</td>
                    </tr>
                    @if($item->persil->luas_peremajaan>0)
                        <tr>
                            <td>Luas lahan yang perlu diremajakan</td>
                            <td>: </td>
                            <td class="pl-1 text-bold-700"> {{$item->persil->luas_peremajaan}}</td>
                        </tr>
                        <tr>
                            <td>Bentuk skema peremajaan</td>
                            <td>: </td>
                            <td class="pl-1 text-bold-700"> {{$item->persil->bentuk_skema_peremajaan}}</td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>
    @endforeach
</div>
