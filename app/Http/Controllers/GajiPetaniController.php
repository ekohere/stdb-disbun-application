<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGajiPetaniRequest;
use App\Http\Requests\UpdateGajiPetaniRequest;
use App\Repositories\GajiPetaniRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GajiPetaniController extends AppBaseController
{
    /** @var  GajiPetaniRepository */
    private $gajiPetaniRepository;

    public function __construct(GajiPetaniRepository $gajiPetaniRepo)
    {
        $this->gajiPetaniRepository = $gajiPetaniRepo;
    }

    /**
     * Display a listing of the GajiPetani.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $gajiPetanis = $this->gajiPetaniRepository->all();

        return view('gaji_petanis.index')
            ->with('gajiPetanis', $gajiPetanis);
    }

    /**
     * Show the form for creating a new GajiPetani.
     *
     * @return Response
     */
    public function create()
    {
        return view('gaji_petanis.create');
    }

    /**
     * Store a newly created GajiPetani in storage.
     *
     * @param CreateGajiPetaniRequest $request
     *
     * @return Response
     */
    public function store(CreateGajiPetaniRequest $request)
    {
        $input = $request->all();

        $gajiPetani = $this->gajiPetaniRepository->create($input);

        Flash::success('Gaji Petani saved successfully.');

        return redirect(route('gajiPetanis.index'));
    }

    /**
     * Display the specified GajiPetani.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gajiPetani = $this->gajiPetaniRepository->find($id);

        if (empty($gajiPetani)) {
            Flash::error('Gaji Petani not found');

            return redirect(route('gajiPetanis.index'));
        }

        return view('gaji_petanis.show')->with('gajiPetani', $gajiPetani);
    }

    /**
     * Show the form for editing the specified GajiPetani.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gajiPetani = $this->gajiPetaniRepository->find($id);

        if (empty($gajiPetani)) {
            Flash::error('Gaji Petani not found');

            return redirect(route('gajiPetanis.index'));
        }

        return view('gaji_petanis.edit')->with('gajiPetani', $gajiPetani);
    }

    /**
     * Update the specified GajiPetani in storage.
     *
     * @param int $id
     * @param UpdateGajiPetaniRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGajiPetaniRequest $request)
    {
        $gajiPetani = $this->gajiPetaniRepository->find($id);

        if (empty($gajiPetani)) {
            Flash::error('Gaji Petani not found');

            return redirect(route('gajiPetanis.index'));
        }

        $gajiPetani = $this->gajiPetaniRepository->update($request->all(), $id);

        Flash::success('Gaji Petani updated successfully.');

        return redirect(route('gajiPetanis.index'));
    }

    /**
     * Remove the specified GajiPetani from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gajiPetani = $this->gajiPetaniRepository->find($id);

        if (empty($gajiPetani)) {
            Flash::error('Gaji Petani not found');

            return redirect(route('gajiPetanis.index'));
        }

        $this->gajiPetaniRepository->delete($id);

        Flash::success('Gaji Petani deleted successfully.');

        return redirect(route('gajiPetanis.index'));
    }
}
