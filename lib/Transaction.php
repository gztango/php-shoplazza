<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 7:27 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/transaction Shoplazza API Reference for Transaction
 */

namespace PHPShoplazza;


class Transaction extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'transaction';
}