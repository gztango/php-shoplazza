<?php
/**
 * Created by PhpStorm.
 * @author Robert Jacobson <rjacobson@thexroadz.com>
 * @author Matthew Crigger <mcrigger@thexroadz.com>
 *
 * @see https://docs.shoplazza.com/en/api/reference/shoplazza_payments/transaction Shoplazza API Reference for Shoplazza Payment Transactions
 */

namespace PHPShoplazza;


class Transactions extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'transaction';

    /**
     * If the resource is read only. (No POST / PUT / DELETE actions)
     *
     * @var boolean
     */
    public $readOnly = true;
}
