<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;

class CupomsController extends Controller
{

    protected $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCategoryRepository()
    {
        return $this->repository;
    }

    public function index()
    {
        $cupoms = $this->repository->paginate();
        return view('admin.cupoms.index', compact('cupoms'));
    }
    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id)
    {
        $cupom = $this->repository->find($id);
        return view('admin.cupoms.edit',compact('cupom'));
    }

    public function update(AdminCupomRequest $request,$id)
    {
        $this->repository->update($request->all(),$id);
        return redirect()->route('admin.cupoms.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.cupoms.index');
    }
}
