<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBDetailRegisterRequest;
use App\Http\Requests\UpdateSTDBDetailRegisterRequest;
use App\Repositories\STDBDetailRegisterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class STDBDetailRegisterController extends AppBaseController
{
    /** @var  STDBDetailRegisterRepository */
    private $sTDBDetailRegisterRepository;

    public function __construct(STDBDetailRegisterRepository $sTDBDetailRegisterRepo)
    {
        $this->sTDBDetailRegisterRepository = $sTDBDetailRegisterRepo;
    }

    /**
     * Display a listing of the STDBDetailRegister.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBDetailRegisters = $this->sTDBDetailRegisterRepository->all();

        return view('s_t_d_b_detail_registers.index')
            ->with('sTDBDetailRegisters', $sTDBDetailRegisters);
    }

    /**
     * Show the form for creating a new STDBDetailRegister.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_detail_registers.create');
    }

    /**
     * Store a newly created STDBDetailRegister in storage.
     *
     * @param CreateSTDBDetailRegisterRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBDetailRegisterRequest $request)
    {
        $input = $request->all();

        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->create($input);

        Flash::success('S T D B Detail Register saved successfully.');

        return redirect(route('sTDBDetailRegisters.index'));
    }

    /**
     * Display the specified STDBDetailRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->find($id);

        if (empty($sTDBDetailRegister)) {
            Flash::error('S T D B Detail Register not found');

            return redirect(route('sTDBDetailRegisters.index'));
        }

        return view('s_t_d_b_detail_registers.show')->with('sTDBDetailRegister', $sTDBDetailRegister);
    }

    /**
     * Show the form for editing the specified STDBDetailRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->find($id);

        if (empty($sTDBDetailRegister)) {
            Flash::error('S T D B Detail Register not found');

            return redirect(route('sTDBDetailRegisters.index'));
        }

        return view('s_t_d_b_detail_registers.edit')->with('sTDBDetailRegister', $sTDBDetailRegister);
    }

    /**
     * Update the specified STDBDetailRegister in storage.
     *
     * @param int $id
     * @param UpdateSTDBDetailRegisterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBDetailRegisterRequest $request)
    {
        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->find($id);

        if (empty($sTDBDetailRegister)) {
            Flash::error('S T D B Detail Register not found');

            return redirect(route('sTDBDetailRegisters.index'));
        }

        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->update($request->all(), $id);

        Flash::success('S T D B Detail Register updated successfully.');

        return redirect(route('sTDBDetailRegisters.index'));
    }

    /**
     * Remove the specified STDBDetailRegister from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->find($id);

        if (empty($sTDBDetailRegister)) {
            Flash::error('S T D B Detail Register not found');

            return redirect(route('sTDBDetailRegisters.index'));
        }

        $this->sTDBDetailRegisterRepository->delete($id);

        Flash::success('S T D B Detail Register deleted successfully.');

        return redirect(route('sTDBDetailRegisters.index'));
    }
}
