<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:52 AM UTC+06:00
 */

namespace PHPShoplazza;


class WebhookTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "topic" => "orders/create",
        "address" => "https://whatever.phpclassic.com/",
        "format" => "json"
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "address" => "https://whatsoever.phpclassic.com/",
    );
}
