<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 9:50 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/abandoned_checkouts Shoplazza API Reference for Abandoned checkouts
 */

namespace PHPShoplazza;


class AbandonedCheckout extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'checkout';
}