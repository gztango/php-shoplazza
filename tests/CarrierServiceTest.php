<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:44 AM UTC+06:00
 */

namespace PHPShoplazza;


class CarrierServiceTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "name" => "Shipping Rate Provider",
        "callback_url" => "http://shippingrateprovider.com",
        "service_discovery" => true
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "name" => "Updated Shipping Rate Provider",
        "active" => false,
    );
}