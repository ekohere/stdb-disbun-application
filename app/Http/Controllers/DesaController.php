<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Repositories\DesaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DesaController extends AppBaseController
{
    /** @var  DesaRepository */
    private $desaRepository;

    public function __construct(DesaRepository $desaRepo)
    {
        $this->desaRepository = $desaRepo;
    }

    /**
     * Display a listing of the Desa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $desas = $this->desaRepository->all();

        return view('desas.index')
            ->with('desas', $desas);
    }

    /**
     * Show the form for creating a new Desa.
     *
     * @return Response
     */
    public function create()
    {
        return view('desas.create');
    }

    /**
     * Store a newly created Desa in storage.
     *
     * @param CreateDesaRequest $request
     *
     * @return Response
     */
    public function store(CreateDesaRequest $request)
    {
        $input = $request->all();

        $desa = $this->desaRepository->create($input);

        Flash::success('Desa saved successfully.');

        return redirect(route('desas.index'));
    }

    /**
     * Display the specified Desa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('desas.index'));
        }

        return view('desas.show')->with('desa', $desa);
    }

    /**
     * Show the form for editing the specified Desa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('desas.index'));
        }

        return view('desas.edit')->with('desa', $desa);
    }

    /**
     * Update the specified Desa in storage.
     *
     * @param int $id
     * @param UpdateDesaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDesaRequest $request)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('desas.index'));
        }

        $desa = $this->desaRepository->update($request->all(), $id);

        Flash::success('Desa updated successfully.');

        return redirect(route('desas.index'));
    }

    /**
     * Remove the specified Desa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('desas.index'));
        }

        $this->desaRepository->delete($id);

        Flash::success('Desa deleted successfully.');

        return redirect(route('desas.index'));
    }
}
