<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 8:07 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/webhook Shoplazza API Reference for Webhook
 */

namespace PHPShoplazza;


class Webhook extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'webhook';
}