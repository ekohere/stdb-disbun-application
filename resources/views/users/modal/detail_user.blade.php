<div class="modal fade text-left" id="detailUser{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailUser{{ $item->id }}"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue bg-darken-1">
                <label class="modal-title font-medium-1 text-text-bold-700 white" id="myModalLabel33">Detail User</label>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x"></i></span>
                </button>
            </div>
            <div class="card-body">
                <div class="font-medium-1 text-bold-800 black"><u>DETAIL AKUN</u></div>
                <div class="card-body">

                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Nama Lengkap</label>
                    <div class="col-md-9">
                        : <span>{{ $item->name }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Nama Tampil</label>
                    <div class="col-md-9">
                        : <span>{{ $item->display_name }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Email</label>
                    <div class="col-md-9">
                        : <span>{{ $item->email }}</span>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-md-3 label-control black text-bold-600" for="projectinput1">Bergabung</label>
                    <div class="col-md-9">
                        : <span>{!! $item->created_at->format('d F Y') !!}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
