<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBPersilRequest;
use App\Http\Requests\UpdateSTDBPersilRequest;
use App\Repositories\STDBPersilRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class STDBPersilController extends AppBaseController
{
    /** @var  STDBPersilRepository */
    private $sTDBPersilRepository;

    public function __construct(STDBPersilRepository $sTDBPersilRepo)
    {
        $this->sTDBPersilRepository = $sTDBPersilRepo;
    }

    /**
     * Display a listing of the STDBPersil.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBPersils = $this->sTDBPersilRepository->all();

        return view('s_t_d_b_persils.index')
            ->with('sTDBPersils', $sTDBPersils);
    }

    /**
     * Show the form for creating a new STDBPersil.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_persils.create');
    }

    /**
     * Store a newly created STDBPersil in storage.
     *
     * @param CreateSTDBPersilRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBPersilRequest $request)
    {
        $input = $request->all();

        $sTDBPersil = $this->sTDBPersilRepository->create($input);

        Flash::success('S T D B Persil saved successfully.');

        return redirect(route('sTDBPersils.index'));
    }

    /**
     * Display the specified STDBPersil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            Flash::error('S T D B Persil not found');

            return redirect(route('sTDBPersils.index'));
        }

        return view('s_t_d_b_persils.show')->with('sTDBPersil', $sTDBPersil);
    }

    /**
     * Show the form for editing the specified STDBPersil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            Flash::error('S T D B Persil not found');

            return redirect(route('sTDBPersils.index'));
        }

        return view('s_t_d_b_persils.edit')->with('sTDBPersil', $sTDBPersil);
    }

    /**
     * Update the specified STDBPersil in storage.
     *
     * @param int $id
     * @param UpdateSTDBPersilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBPersilRequest $request)
    {
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            Flash::error('S T D B Persil not found');

            return redirect(route('sTDBPersils.index'));
        }

        $sTDBPersil = $this->sTDBPersilRepository->update($request->all(), $id);

        Flash::success('S T D B Persil updated successfully.');

        return redirect(route('sTDBPersils.index'));
    }

    /**
     * Remove the specified STDBPersil from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            Flash::error('S T D B Persil not found');

            return redirect(route('sTDBPersils.index'));
        }

        $this->sTDBPersilRepository->delete($id);

        Flash::success('S T D B Persil deleted successfully.');

        return redirect(route('sTDBPersils.index'));
    }
}
