<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 10:49 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/carrierservice Shoplazza API Reference for CarrierService
 */

namespace PHPShoplazza;


class CarrierService extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'carrier_service';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;
}