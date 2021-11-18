<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisPelayananRequest;
use App\Http\Requests\UpdateJenisPelayananRequest;
use App\Repositories\JenisPelayananRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class JenisPelayananController extends AppBaseController
{
    /** @var  JenisPelayananRepository */
    private $jenisPelayananRepository;

    public function __construct(JenisPelayananRepository $jenisPelayananRepo)
    {
        $this->jenisPelayananRepository = $jenisPelayananRepo;
    }

    /**
     * Display a listing of the JenisPelayanan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jenisPelayanans = $this->jenisPelayananRepository->all();

        return view('jenis_pelayanans.index')
            ->with('jenisPelayanans', $jenisPelayanans);
    }

    /**
     * Show the form for creating a new JenisPelayanan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_pelayanans.create');
    }

    /**
     * Store a newly created JenisPelayanan in storage.
     *
     * @param CreateJenisPelayananRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisPelayananRequest $request)
    {
        $input = $request->all();

        $jenisPelayanan = $this->jenisPelayananRepository->create($input);

        Flash::success('Jenis Pelayanan saved successfully.');

        return redirect(route('jenisPelayanans.index'));
    }

    /**
     * Display the specified JenisPelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisPelayanan = $this->jenisPelayananRepository->find($id);

        if (empty($jenisPelayanan)) {
            Flash::error('Jenis Pelayanan not found');

            return redirect(route('jenisPelayanans.index'));
        }

        return view('jenis_pelayanans.show')->with('jenisPelayanan', $jenisPelayanan);
    }

    /**
     * Show the form for editing the specified JenisPelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisPelayanan = $this->jenisPelayananRepository->find($id);

        if (empty($jenisPelayanan)) {
            Flash::error('Jenis Pelayanan not found');

            return redirect(route('jenisPelayanans.index'));
        }

        return view('jenis_pelayanans.edit')->with('jenisPelayanan', $jenisPelayanan);
    }

    /**
     * Update the specified JenisPelayanan in storage.
     *
     * @param int $id
     * @param UpdateJenisPelayananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisPelayananRequest $request)
    {
        $jenisPelayanan = $this->jenisPelayananRepository->find($id);

        if (empty($jenisPelayanan)) {
            Flash::error('Jenis Pelayanan not found');

            return redirect(route('jenisPelayanans.index'));
        }

        $jenisPelayanan = $this->jenisPelayananRepository->update($request->all(), $id);

        Flash::success('Jenis Pelayanan updated successfully.');

        return redirect(route('jenisPelayanans.index'));
    }

    /**
     * Remove the specified JenisPelayanan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisPelayanan = $this->jenisPelayananRepository->find($id);

        if (empty($jenisPelayanan)) {
            Flash::error('Jenis Pelayanan not found');

            return redirect(route('jenisPelayanans.index'));
        }

        $this->jenisPelayananRepository->delete($id);

        Flash::success('Jenis Pelayanan deleted successfully.');

        return redirect(route('jenisPelayanans.index'));
    }
}
