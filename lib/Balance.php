<?php
/**
 * Created by PhpStorm.
 * @author Robert Jacobson <rjacobson@thexroadz.com>
 * @author Matthew Crigger <mcrigger@thexroadz.com>
 *
 * @see https://docs.shoplazza.com/en/api/reference/shoplazza_payments/balance Shoplazza API Reference for Shoplazza Payment Balance
 */

namespace PHPShoplazza;

/**
 * --------------------------------------------------------------------------
 * ShoplazzaPayment -> Child Resources
 * --------------------------------------------------------------------------
 *
 *
 */
class Balance extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'balance';

    /**
     * Get the pluralized version of the resource key
     *
     * Normally its the same as $resourceKey appended with 's', when it's different, the specific resource class will override this function
     *
     * @return string
     */
    protected function pluralizeKey()
    {
        return $this->resourceKey;
    }

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
        'Transactions'
    );
}