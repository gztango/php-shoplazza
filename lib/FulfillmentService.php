<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 5:28 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/fulfillmentservice Shoplazza API Reference for FulfillmentService
 */

namespace PHPShoplazza;


class FulfillmentService extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'fulfillment_service';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;
}