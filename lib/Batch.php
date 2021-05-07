<?php
/**
 * @see https://docs.shoplazza.com/api/reference/discounts/discountcode Shoplazza API Reference for PriceRule
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * DiscountCode -> Batch action
 * --------------------------------------------------------------------------
 *
 */

class Batch extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'batch';

    protected function getResourcePath()
    {
        return $this->resourceKey;
    }

    protected function wrapData($dataArray, $dataKey = null)
    {
        return ['discount_codes' => $dataArray];
    }

}
