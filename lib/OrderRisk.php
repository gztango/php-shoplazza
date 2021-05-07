<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 6:10 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/order_risks Shoplazza API Reference for Order Risks
 */

namespace PHPShoplazza;


class OrderRisk extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'risk';
}