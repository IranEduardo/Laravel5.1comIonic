<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{

    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();
        return view('admin.orders.index', compact('orders'));
    }
    
    public function show($id)
    {
        $order = $this->repository->find($id);
        return view('admin.orders.show', compact('order'));
    }

  }
