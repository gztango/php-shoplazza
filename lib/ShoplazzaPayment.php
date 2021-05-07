<?php
/**
 * Created by PhpStorm.
 * @author Victor Kislichenko <v.kislichenko@gmail.com>
 * Created at 01/06/2020 16:45 AM UTC+03:00
 *
 * @see https://shoplazza.dev/docs/admin-api/rest/reference/shoplazza_payments Shoplazza API Reference for ShoplazzaPayment
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * ShoplazzaPayment -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read ShoplazzaResource $Dispute
 *
 * @method ShoplazzaResource Dispute(integer $id = null)
 *
 * @property-read ShoplazzaResource $Balance
 *
 * @method ShoplazzaResource Balance(integer $id = null)
 *
 * @property-read ShoplazzaResource $Payouts
 *
 * @method ShoplazzaResource Payouts(integer $id = null)
 *

 */
class ShoplazzaPayment extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $resourceKey = 'shoplazza_payment';

    /**
     * If the resource is read only. (No POST / PUT / DELETE actions)
     *
     * @var boolean
     */
    public $readOnly = true;

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Balance',
        'Dispute',
        'Payouts',
    );
}