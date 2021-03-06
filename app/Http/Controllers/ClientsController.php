<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use CodeDelivery\Http\Controllers\Controller;

class ClientsController extends Controller
{

    protected $repository;
    protected $service;

    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    public function index()
    {
        $clients = $this->repository->paginate();
        return view('admin.clients.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request)
    {
        $dados = $request->all();
        $this->service->create($dados);
        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);
        return view('admin.clients.edit',compact('client'));
    }

    public function update(AdminClientRequest $request,$id)
    {
        $this->service->update($request->all(),$id);
        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.clients.index');
    }
}
