<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    protected $OrderRepository;
    protected $UserRepository;
    protected $ProductRepository;
    
   
    public function __construct(
          OrderRepository $OrderRepository,
          UserRepository $UserRepository,
          ProductRepository $ProductRepository)
    {
        $this->OrderRepository     = $OrderRepository;
        $this->UserRepository      = $UserRepository;
        $this->ProductRepository   = $ProductRepository;
    }

    public function create()
    {
        $products = $this->ProductRepository->all();
        return view('customer.orders.create',compact('products'));
    }

    public function store(Request $request)
    {
        return view('customer.orders.create');
    }

  }
