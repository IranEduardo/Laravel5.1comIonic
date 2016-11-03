<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'client_id',
        'user_deliveryman_id',
        'total',
        'status'
    ];

    private $statuslist = [
         'Aguardando pagamento',
         'Pagamento não confirado',
         'Pagamento confirmado',
         'Pedido enviado',
         'Recebido',
         'Devolvido',
         'Cancelado pelo comprador',
         'Cancelado pelo logista'
    ];

    /**
     * @return array
     */
    public function getStatuslist()
    {
        return $this->statuslist;
    }


    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function deliveryman() {
        return $this->belongsTo(User::class,'user_deliveryman_id','id');
    }

}
