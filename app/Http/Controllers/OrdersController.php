<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{

    protected $repository;
    protected $repositoryUser;
    
   
    public function __construct(OrderRepository $repository, UserRepository $userRepository)
    {
        $this->repository     = $repository;
        $this->repositoryUser = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();
        return view('admin.orders.index', compact('orders'));
    }
    
    public function show($id)
    {
        $order = $this->repository->find($id);
        $deliverymen =  $this->repositoryUser->all()->lists('name','id');
        $deliverymen = $deliverymen->toArray();
        array_unshift($deliverymen, '--Selecione um entregador--');
        return view('admin.orders.show', compact('order','deliverymen'));
    }

    public function update(Request $request, $id)
    {
        $order = $this->repository->find($id);
       $dados = $request->all();
       if ($dados['user_deliveryman_id'] == 0)
           $dados['user_deliveryman_id'] = null;
       $order->update($dados,$id);
       return redirect()->route('admin.orders.index');
    }

  }
