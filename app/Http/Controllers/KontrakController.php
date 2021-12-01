<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKontrakRequest;
use App\Http\Requests\UpdateKontrakRequest;
use App\Repositories\KontrakRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KontrakController extends AppBaseController
{
    /** @var  KontrakRepository */
    private $kontrakRepository;

    public function __construct(KontrakRepository $kontrakRepo)
    {
        $this->kontrakRepository = $kontrakRepo;
    }

    /**
     * Display a listing of the Kontrak.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kontraks = $this->kontrakRepository->all();

        return view('kontraks.index')
            ->with('kontraks', $kontraks);
    }

    /**
     * Show the form for creating a new Kontrak.
     *
     * @return Response
     */
    public function create()
    {
        return view('kontraks.create');
    }

    /**
     * Store a newly created Kontrak in storage.
     *
     * @param CreateKontrakRequest $request
     *
     * @return Response
     */
    public function store(CreateKontrakRequest $request)
    {
        $input = $request->all();

        $kontrak = $this->kontrakRepository->create($input);

        Flash::success('Kontrak saved successfully.');

        return redirect(route('kontraks.index'));
    }

    /**
     * Display the specified Kontrak.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kontrak = $this->kontrakRepository->find($id);

        if (empty($kontrak)) {
            Flash::error('Kontrak not found');

            return redirect(route('kontraks.index'));
        }

        return view('kontraks.show')->with('kontrak', $kontrak);
    }

    /**
     * Show the form for editing the specified Kontrak.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kontrak = $this->kontrakRepository->find($id);

        if (empty($kontrak)) {
            Flash::error('Kontrak not found');

            return redirect(route('kontraks.index'));
        }

        return view('kontraks.edit')->with('kontrak', $kontrak);
    }

    /**
     * Update the specified Kontrak in storage.
     *
     * @param int $id
     * @param UpdateKontrakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKontrakRequest $request)
    {
        $kontrak = $this->kontrakRepository->find($id);

        if (empty($kontrak)) {
            Flash::error('Kontrak not found');

            return redirect(route('kontraks.index'));
        }

        $kontrak = $this->kontrakRepository->update($request->all(), $id);

        Flash::success('Kontrak updated successfully.');

        return redirect(route('kontraks.index'));
    }

    /**
     * Remove the specified Kontrak from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kontrak = $this->kontrakRepository->find($id);

        if (empty($kontrak)) {
            Flash::error('Kontrak not found');

            return redirect(route('kontraks.index'));
        }

        $this->kontrakRepository->delete($id);

        Flash::success('Kontrak deleted successfully.');

        return redirect(route('kontraks.index'));
    }
}
