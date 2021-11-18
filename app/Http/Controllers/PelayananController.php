<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePelayananRequest;
use App\Http\Requests\UpdatePelayananRequest;
use App\Models\JenisPelayanan;
use App\Models\Pelayanan;
use App\Repositories\PelayananRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PelayananController extends AppBaseController
{
    /** @var  PelayananRepository */
    private $pelayananRepository;

    public function __construct(PelayananRepository $pelayananRepo)
    {
        $this->pelayananRepository = $pelayananRepo;
    }

    /**
     * Display a listing of the Pelayanan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pelayanans = $this->pelayananRepository->all();

        return view('pelayanans.index')
            ->with('pelayanans', $pelayanans);
    }

    /**
     * Show the form for creating a new Pelayanan.
     *
     * @return Response
     */
    public function create()
    {
        $jenisPelayanan=JenisPelayanan::pluck('name','id');
        return view('pelayanans.create',compact('jenisPelayanan'));
    }

    /**
     * Store a newly created Pelayanan in storage.
     *
     * @param CreatePelayananRequest $request
     *
     * @return Response
     */
    public function store(CreatePelayananRequest $request)
    {
        $input = $request->all();

        $pelayanan = $this->pelayananRepository->create($input);

        Flash::success('Pelayanan saved successfully.');

        return redirect(route('pelayanans.index'));
    }

    /**
     * Display the specified Pelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelayanan = $this->pelayananRepository->find($id);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');

            return redirect(route('pelayanans.index'));
        }

        return view('pelayanans.show')->with('pelayanan', $pelayanan);
    }

    /**
     * Show the form for editing the specified Pelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pelayanan = $this->pelayananRepository->find($id);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');

            return redirect(route('pelayanans.index'));
        }
        $jenisPelayanan=JenisPelayanan::pluck('name','id');
        return view('pelayanans.edit',compact('jenisPelayanan'))->with('pelayanan', $pelayanan);
    }

    /**
     * Update the specified Pelayanan in storage.
     *
     * @param int $id
     * @param UpdatePelayananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelayananRequest $request)
    {
        $pelayanan = $this->pelayananRepository->find($id);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');

            return redirect(route('pelayanans.index'));
        }

        $pelayanan = $this->pelayananRepository->update($request->all(), $id);

        Flash::success('Pelayanan updated successfully.');

        return redirect(route('pelayanans.index'));
    }

    /**
     * Remove the specified Pelayanan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelayanan = $this->pelayananRepository->find($id);

        if (empty($pelayanan)) {
            Flash::error('Pelayanan not found');

            return redirect(route('pelayanans.index'));
        }

        $this->pelayananRepository->delete($id);

        Flash::success('Pelayanan deleted successfully.');

        return redirect(route('pelayanans.index'));
    }
}
