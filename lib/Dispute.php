<?php
/**
 * Created by PhpStorm.
 * @author Victor Kislichenko <v.kislichenko@gmail.com>
 * Created at 01/06/2020 16:45 AM UTC+03:00
 *
 * @see https://shoplazza.dev/docs/admin-api/rest/reference/shoplazza_payments/dispute Shoplazza API Reference for Dispute
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * ShoplazzaPayment -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read ShoplazzaResource $DiscountCode
 *
 * @method ShoplazzaResource DiscountCode(integer $id = null)
 *
 */
class Dispute extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $resourceKey = 'dispute';


}