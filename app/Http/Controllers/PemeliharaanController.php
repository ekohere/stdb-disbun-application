<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePemeliharaanRequest;
use App\Http\Requests\UpdatePemeliharaanRequest;
use App\Repositories\PemeliharaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PemeliharaanController extends AppBaseController
{
    /** @var  PemeliharaanRepository */
    private $pemeliharaanRepository;

    public function __construct(PemeliharaanRepository $pemeliharaanRepo)
    {
        $this->pemeliharaanRepository = $pemeliharaanRepo;
    }

    /**
     * Display a listing of the Pemeliharaan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pemeliharaans = $this->pemeliharaanRepository->all();

        return view('pemeliharaans.index')
            ->with('pemeliharaans', $pemeliharaans);
    }

    /**
     * Show the form for creating a new Pemeliharaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemeliharaans.create');
    }

    /**
     * Store a newly created Pemeliharaan in storage.
     *
     * @param CreatePemeliharaanRequest $request
     *
     * @return Response
     */
    public function store(CreatePemeliharaanRequest $request)
    {
        $input = $request->all();

        $pemeliharaan = $this->pemeliharaanRepository->create($input);

        Flash::success('Pemeliharaan saved successfully.');

        return redirect(route('pemeliharaans.index'));
    }

    /**
     * Display the specified Pemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemeliharaan = $this->pemeliharaanRepository->find($id);

        if (empty($pemeliharaan)) {
            Flash::error('Pemeliharaan not found');

            return redirect(route('pemeliharaans.index'));
        }

        return view('pemeliharaans.show')->with('pemeliharaan', $pemeliharaan);
    }

    /**
     * Show the form for editing the specified Pemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemeliharaan = $this->pemeliharaanRepository->find($id);

        if (empty($pemeliharaan)) {
            Flash::error('Pemeliharaan not found');

            return redirect(route('pemeliharaans.index'));
        }

        return view('pemeliharaans.edit')->with('pemeliharaan', $pemeliharaan);
    }

    /**
     * Update the specified Pemeliharaan in storage.
     *
     * @param int $id
     * @param UpdatePemeliharaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemeliharaanRequest $request)
    {
        $pemeliharaan = $this->pemeliharaanRepository->find($id);

        if (empty($pemeliharaan)) {
            Flash::error('Pemeliharaan not found');

            return redirect(route('pemeliharaans.index'));
        }

        $pemeliharaan = $this->pemeliharaanRepository->update($request->all(), $id);

        Flash::success('Pemeliharaan updated successfully.');

        return redirect(route('pemeliharaans.index'));
    }

    /**
     * Remove the specified Pemeliharaan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemeliharaan = $this->pemeliharaanRepository->find($id);

        if (empty($pemeliharaan)) {
            Flash::error('Pemeliharaan not found');

            return redirect(route('pemeliharaans.index'));
        }

        $this->pemeliharaanRepository->delete($id);

        Flash::success('Pemeliharaan deleted successfully.');

        return redirect(route('pemeliharaans.index'));
    }
}
