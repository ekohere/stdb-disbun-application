<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePetaPersilRequest;
use App\Http\Requests\UpdatePetaPersilRequest;
use App\Repositories\PetaPersilRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PetaPersilController extends AppBaseController
{
    /** @var  PetaPersilRepository */
    private $petaPersilRepository;

    public function __construct(PetaPersilRepository $petaPersilRepo)
    {
        $this->petaPersilRepository = $petaPersilRepo;
    }

    /**
     * Display a listing of the PetaPersil.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $petaPersils = $this->petaPersilRepository->all();

        return view('peta_persils.index')
            ->with('petaPersils', $petaPersils);
    }

    /**
     * Show the form for creating a new PetaPersil.
     *
     * @return Response
     */
    public function create()
    {
        return view('peta_persils.create');
    }

    /**
     * Store a newly created PetaPersil in storage.
     *
     * @param CreatePetaPersilRequest $request
     *
     * @return Response
     */
    public function store(CreatePetaPersilRequest $request)
    {
        $input = $request->all();

        $petaPersil = $this->petaPersilRepository->create($input);

        Flash::success('Peta Persil saved successfully.');

        return redirect(route('petaPersils.index'));
    }

    /**
     * Display the specified PetaPersil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $petaPersil = $this->petaPersilRepository->find($id);

        if (empty($petaPersil)) {
            Flash::error('Peta Persil not found');

            return redirect(route('petaPersils.index'));
        }

        return view('peta_persils.show')->with('petaPersil', $petaPersil);
    }

    /**
     * Show the form for editing the specified PetaPersil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $petaPersil = $this->petaPersilRepository->find($id);

        if (empty($petaPersil)) {
            Flash::error('Peta Persil not found');

            return redirect(route('petaPersils.index'));
        }

        return view('peta_persils.edit')->with('petaPersil', $petaPersil);
    }

    /**
     * Update the specified PetaPersil in storage.
     *
     * @param int $id
     * @param UpdatePetaPersilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePetaPersilRequest $request)
    {
        $petaPersil = $this->petaPersilRepository->find($id);

        if (empty($petaPersil)) {
            Flash::error('Peta Persil not found');

            return redirect(route('petaPersils.index'));
        }

        $petaPersil = $this->petaPersilRepository->update($request->all(), $id);

        Flash::success('Peta Persil updated successfully.');

        return redirect(route('petaPersils.index'));
    }

    /**
     * Remove the specified PetaPersil from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $petaPersil = $this->petaPersilRepository->find($id);

        if (empty($petaPersil)) {
            Flash::error('Peta Persil not found');

            return redirect(route('petaPersils.index'));
        }

        $this->petaPersilRepository->delete($id);

        Flash::success('Peta Persil deleted successfully.');

        return redirect(route('petaPersils.index'));
    }
}
