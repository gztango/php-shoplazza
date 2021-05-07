<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:47 AM UTC+06:00
 */

namespace PHPShoplazza;


class FulfillmentServiceTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "name" => "MarsFulfillment",
        "callback_url" => "http://google.com",
        "inventory_management" => true,
        "tracking_support" => true,
        "requires_shipping_method" => true,
        "format" => "json"
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "tracking_support" => false
    );

}