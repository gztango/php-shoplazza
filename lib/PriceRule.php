<?php
/**
 * Created by PhpStorm.
 * @author Sergiu Cazac <kilobyte2007@gmail.com>
 * Created at 5/06/19 2:06 AM UTC+03:00
 *
 * @see https://docs.shoplazza.com/api/reference/discounts/pricerule Shoplazza API Reference for PriceRule
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * PriceRule -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read ShoplazzaResource $DiscountCode
 *
 * @method ShoplazzaResource DiscountCode(integer $id = null)
 * @method ShoplazzaResource Batch()
 *
 */
class PriceRule extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $resourceKey = 'price_rule';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'DiscountCode',
        'Batch',
    );
}
