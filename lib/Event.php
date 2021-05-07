<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 8/21/16 8:39 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/event/ Shoplazza API Reference for Event
 */

namespace PHPShoplazza;


class Event extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'event';
}