<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBRegisterRequest;
use App\Http\Requests\UpdateSTDBRegisterRequest;
use App\Repositories\STDBRegisterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class STDBRegisterController extends AppBaseController
{
    /** @var  STDBRegisterRepository */
    private $sTDBRegisterRepository;

    public function __construct(STDBRegisterRepository $sTDBRegisterRepo)
    {
        $this->sTDBRegisterRepository = $sTDBRegisterRepo;
    }

    /**
     * Display a listing of the STDBRegister.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBRegisters = $this->sTDBRegisterRepository->all();

        return view('s_t_d_b_registers.index')
            ->with('sTDBRegisters', $sTDBRegisters);
    }

    /**
     * Show the form for creating a new STDBRegister.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_registers.create');
    }

    /**
     * Store a newly created STDBRegister in storage.
     *
     * @param CreateSTDBRegisterRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBRegisterRequest $request)
    {
        $input = $request->all();

        $sTDBRegister = $this->sTDBRegisterRepository->create($input);

        Flash::success('S T D B Register saved successfully.');

        return redirect(route('sTDBRegisters.index'));
    }

    /**
     * Display the specified STDBRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);


        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');

            return redirect(route('sTDBRegisters.index'));
        }
        return view('s_t_d_b_registers.show')->with('sTDBRegister', $sTDBRegister);
    }

    /**
     * Show the form for editing the specified STDBRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');

            return redirect(route('sTDBRegisters.index'));
        }

        return view('s_t_d_b_registers.edit')->with('sTDBRegister', $sTDBRegister);
    }

    /**
     * Update the specified STDBRegister in storage.
     *
     * @param int $id
     * @param UpdateSTDBRegisterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBRegisterRequest $request)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');

            return redirect(route('sTDBRegisters.index'));
        }

        $sTDBRegister = $this->sTDBRegisterRepository->update($request->all(), $id);

        Flash::success('S T D B Register updated successfully.');

        return redirect(route('sTDBRegisters.index'));
    }

    /**
     * Remove the specified STDBRegister from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');

            return redirect(route('sTDBRegisters.index'));
        }

        $this->sTDBRegisterRepository->delete($id);

        Flash::success('S T D B Register deleted successfully.');

        return redirect(route('sTDBRegisters.index'));
    }
}
