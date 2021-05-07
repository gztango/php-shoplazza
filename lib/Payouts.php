<?php
/**
 * Created by PhpStorm.
 * @author Robert Jacobson <rjacobson@thexroadz.com>
 * @author Matthew Crigger <mcrigger@thexroadz.com>
 *
 * @see https://docs.shoplazza.com/en/api/reference/shoplazza_payments/payout Shoplazza API Reference for Shoplazza Payment Payouts
 */

namespace PHPShoplazza;

/**
 * --------------------------------------------------------------------------
 * ShoplazzaPayment -> Child Resources
 * --------------------------------------------------------------------------
 *
 *
 */
class Payouts extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'payout';
}