<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 3:39 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/asset Shoplazza API Reference for Asset
 */

namespace PHPShoplazza;


class Asset extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'asset';
}