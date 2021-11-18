<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSyaratPelayananRequest;
use App\Http\Requests\UpdateSyaratPelayananRequest;
use App\Models\FileDownload;
use App\Models\Pelayanan;
use App\Models\SyaratPelayanan;
use App\Models\TipeSyarat;
use App\Repositories\SyaratPelayananRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SyaratPelayananController extends AppBaseController
{
    /** @var  SyaratPelayananRepository */
    private $syaratPelayananRepository;

    public function __construct(SyaratPelayananRepository $syaratPelayananRepo)
    {
        $this->syaratPelayananRepository = $syaratPelayananRepo;
    }

    /**
     * Display a listing of the SyaratPelayanan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input=$request->all();

        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $syaratPelayanans = SyaratPelayanan::where('pelayanan_id',$input['pelayanan_id'])
            ->withTrashed()->orderBy('deleted_at')->get();

        return view('syarat_pelayanans.index',compact('pelayanan'))
            ->with('syaratPelayanans', $syaratPelayanans);
    }

    /**
     * Show the form for creating a new SyaratPelayanan.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $input=$request->all();
        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $tipeSyarat=TipeSyarat::pluck('name','id');
        $fileDownload=FileDownload::pluck('name','id');
        return view('syarat_pelayanans.create',compact('tipeSyarat','pelayanan','fileDownload'));
    }

    /**
     * Store a newly created SyaratPelayanan in storage.
     *
     * @param CreateSyaratPelayananRequest $request
     *
     * @return Response
     */
    public function store(CreateSyaratPelayananRequest $request)
    {
        $input = $request->all();

        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $syaratPelayanan = $this->syaratPelayananRepository->create($input);

        Flash::success('Syarat Pelayanan saved successfully.');

        return redirect(route('syaratPelayanans.index',['pelayanan_id'=>$input['pelayanan_id']]));
    }

    /**
     * Display the specified SyaratPelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id,Request $request)
    {
        $input=$request->all();
        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $syaratPelayanan = SyaratPelayanan::where('pelayanan_id',$input['pelayanan_id'])
            ->where('id',$id)->first();

        if (empty($syaratPelayanan)) {
            Flash::error('Syarat Pelayanan not found');

            return redirect(route('syaratPelayanans.index',['pelayanan_id',$pelayanan->id]));
        }

        return view('syarat_pelayanans.show',compact('pelayanan'))->with('syaratPelayanan', $syaratPelayanan);
    }

    /**
     * Show the form for editing the specified SyaratPelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id,Request  $request)
    {
        $input=$request->all();
        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $syaratPelayanan = SyaratPelayanan::where('pelayanan_id',$input['pelayanan_id'])->where('id',$id)->first();

        if (empty($syaratPelayanan)) {
            Flash::error('Syarat Pelayanan not found');

            return redirect(route('syaratPelayanans.index',['pelayanan_id',$pelayanan->id]));
        }

        $tipeSyarat=TipeSyarat::pluck('name','id');
        $fileDownload=FileDownload::pluck('name','id');
        return view('syarat_pelayanans.edit',compact('tipeSyarat','pelayanan','fileDownload'))->with('syaratPelayanan', $syaratPelayanan);
    }

    /**
     * Update the specified SyaratPelayanan in storage.
     *
     * @param int $id
     * @param UpdateSyaratPelayananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSyaratPelayananRequest $request)
    {
        $input=$request->all();
        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $syaratPelayanan = $this->syaratPelayananRepository->find($id);

        if (empty($syaratPelayanan)) {
            Flash::error('Syarat Pelayanan not found');
            return redirect(route('syaratPelayanans.index',['pelayanan_id',$pelayanan->id]));
        }

        $syaratPelayanan = $this->syaratPelayananRepository->update($request->all(), $id);

        Flash::success('Syarat Pelayanan updated successfully.');

        return redirect(route('syaratPelayanans.index',['pelayanan_id'=>$input['pelayanan_id']]));
    }

    /**
     * Remove the specified SyaratPelayanan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $input=$request->all();
        if (!isset($input['pelayanan_id'])) {
            Flash::error('Pelayanan input not found');
            return redirect()->back();
        }

        $pelayanan=Pelayanan::find($input['pelayanan_id']);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');
            return redirect()->back();
        }

        $syaratPelayanan = SyaratPelayanan::withTrashed()->find($id);

        if (empty($syaratPelayanan)) {
            Flash::error('Syarat Pelayanan not found');

            return redirect(route('syaratPelayanans.index'));
        }

        if(!$syaratPelayanan->trashed()){
            $this->syaratPelayananRepository->delete($id);
            Flash::success('Syarat Pelayanan deleted successfully.');
        }else{
            $syaratPelayanan->restore();
            Flash::success('Syarat Pelayanan restore successfully.');
        }

        return redirect(route('syaratPelayanans.index',['pelayanan_id'=>$input['pelayanan_id']]));
    }
}
