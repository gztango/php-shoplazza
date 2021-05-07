<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 7:49 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/usagecharge Shoplazza API Reference for UsageCharge
 */

namespace PHPShoplazza;


class UsageCharge extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'usage_charge';
}