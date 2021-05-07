<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 7:36 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/shipping_zone Shoplazza API Reference for Shipping Zone
 */

namespace PHPShoplazza;


class ShippingZone extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'shipping_zone';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;

    /**
     * @inheritDoc
     */
    public $readOnly = true;
}