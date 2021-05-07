<?php
/**
 * Created by PhpStorm.
 * @author Sergiu Cazac <kilobyte2007@gmail.com>
 * Created at 5/06/19 2:09 AM UTC+03:00
 *
 * @see https://docs.shoplazza.com/api/reference/discounts/discountcode Shoplazza API Reference for PriceRule
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * DiscountCode -> Custom actions
 * --------------------------------------------------------------------------
 * @method array lookup()       Retrieves the location of a discount code.
 *
 */

class DiscountCode extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'discount_code';

    /**
     * @inheritDoc
     */
    protected $customGetActions = array(
        'lookup',
    );
}