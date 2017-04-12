<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'product'
    ];
    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
            'id'         => (int)   $model->id,
            'price'      => (float) $model->price,
            'qtde'       => (int)   $model->qtde
        ];
    }

    public function includeProduct(OrderItem $model)
    {
        return $this->item($model->product, new ProductTransformer());
    }
}
