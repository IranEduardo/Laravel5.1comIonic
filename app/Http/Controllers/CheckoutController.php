<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    protected $OrderRepository;
    protected $UserRepository;
    protected $ProductRepository;
    protected $OrderService;
    
   
    public function __construct(
          OrderRepository $OrderRepository,
          UserRepository $UserRepository,
          ProductRepository $ProductRepository,
          OrderService $OrderService  )
    {
        $this->OrderRepository     = $OrderRepository;
        $this->UserRepository      = $UserRepository;
        $this->ProductRepository   = $ProductRepository;
        $this->OrderService        = $OrderService;
    }

    public function index()
    {
        $clientId = $this->UserRepository->find(Auth::user()->id)->client->id;
        $orders = $this->OrderRepository->scopeQuery(function($query) use($clientId) {
           return $query->where('client_id','=',$clientId);
        })->paginate();
        return view('customer.orders.index', compact('orders'));
    }

    public function create()
    {
        $products = $this->ProductRepository->all();
        return view('customer.orders.create',compact('products'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $clientId = $this->UserRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->OrderService->create($data);

        return redirect()->route('customer.orders.index');
    }

}
