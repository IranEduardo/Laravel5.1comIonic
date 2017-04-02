<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{

    protected $OrderRepository;
    protected $OrderService;
    
   
    public function __construct(
          OrderRepository $OrderRepository,
          OrderService $OrderService  )
    {
        $this->OrderRepository     = $OrderRepository;
        $this->OrderService        = $OrderService;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->OrderRepository->with(['items','items.product'])->scopeQuery(function($query) use($id) {
           return $query->where('user_deliveryman_id','=',$id);
        })->paginate();
        return $orders;
    }

    public function show($id)
    {
       $idDeliveryman = Authorizer::getResourceOwnerId();
       $order = $this->OrderRepository->getByIdAndDeliveryman($id, $idDeliveryman);
       if ($order) {
            return $order;
        }
        abort(400,"Order não encontrada");
    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->OrderService->updateStatus($id, $idDeliveryman, $request->get('status'));
        if ($order) {
            return $order;
        }
        abort(400,"Order não encontrada");
    }

}
