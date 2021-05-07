<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 4:49 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/fulfillmentevent Shoplazza API Reference for FulfillmentEvent
 */

namespace PHPShoplazza;


class FulfillmentEvent extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'fulfillment_event';

    /**
     * @inheritDoc
     */
    public function getResourcePath()
    {
        return 'events';
    }

    /**
     * @inheritDoc
     */
    public function getResourcePostKey()
    {
        return 'event';
    }
}