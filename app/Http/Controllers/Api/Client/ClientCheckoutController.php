<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{

    protected $OrderRepository;
    protected $UserRepository;
    protected $OrderService;

    protected $with = ['items','items.product','cupom'];
    
   
    public function __construct(
          OrderRepository $OrderRepository,
          UserRepository $UserRepository,
          OrderService $OrderService  )
    {
        $this->OrderRepository     = $OrderRepository;
        $this->UserRepository      = $UserRepository;
        $this->OrderService        = $OrderService;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->UserRepository->find($id)->client->id;
        $orders = $this->OrderRepository
            ->skipPresenter(false)
            ->with($this->with)
            ->scopeQuery(function($query) use($clientId) {
                return $query->where('client_id','=',$clientId);
        })->paginate();
        return $orders;
    }


    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->UserRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $o =  $this->OrderService->create($data);
        $o =  $this->OrderRepository
               ->skipPresenter(false)
               ->with($this->with)
               ->find($o->id);
        return $o;
    }

    public function show($id)
    {
       return $this->OrderRepository
             ->skipPresenter(false)
             ->with($this->with)
             ->find($id);
    }

}
