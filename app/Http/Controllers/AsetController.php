<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsetRequest;
use App\Http\Requests\UpdateAsetRequest;
use App\Repositories\AsetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AsetController extends AppBaseController
{
    /** @var  AsetRepository */
    private $asetRepository;

    public function __construct(AsetRepository $asetRepo)
    {
        $this->asetRepository = $asetRepo;
    }

    /**
     * Display a listing of the Aset.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $asets = $this->asetRepository->all();

        return view('asets.index')
            ->with('asets', $asets);
    }

    /**
     * Show the form for creating a new Aset.
     *
     * @return Response
     */
    public function create()
    {
        return view('asets.create');
    }

    /**
     * Store a newly created Aset in storage.
     *
     * @param CreateAsetRequest $request
     *
     * @return Response
     */
    public function store(CreateAsetRequest $request)
    {
        $input = $request->all();

        $aset = $this->asetRepository->create($input);

        Flash::success('Aset saved successfully.');

        return redirect(route('asets.index'));
    }

    /**
     * Display the specified Aset.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aset = $this->asetRepository->find($id);

        if (empty($aset)) {
            Flash::error('Aset not found');

            return redirect(route('asets.index'));
        }

        return view('asets.show')->with('aset', $aset);
    }

    /**
     * Show the form for editing the specified Aset.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aset = $this->asetRepository->find($id);

        if (empty($aset)) {
            Flash::error('Aset not found');

            return redirect(route('asets.index'));
        }

        return view('asets.edit')->with('aset', $aset);
    }

    /**
     * Update the specified Aset in storage.
     *
     * @param int $id
     * @param UpdateAsetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsetRequest $request)
    {
        $aset = $this->asetRepository->find($id);

        if (empty($aset)) {
            Flash::error('Aset not found');

            return redirect(route('asets.index'));
        }

        $aset = $this->asetRepository->update($request->all(), $id);

        Flash::success('Aset updated successfully.');

        return redirect(route('asets.index'));
    }

    /**
     * Remove the specified Aset from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aset = $this->asetRepository->find($id);

        if (empty($aset)) {
            Flash::error('Aset not found');

            return redirect(route('asets.index'));
        }

        $this->asetRepository->delete($id);

        Flash::success('Aset deleted successfully.');

        return redirect(route('asets.index'));
    }
}
