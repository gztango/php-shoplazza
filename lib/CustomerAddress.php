<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 12:07 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/customeraddress Shoplazza API Reference for CustomerAddress
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * CustomerAddress -> Custom actions
 * --------------------------------------------------------------------------
 * @method array makeDefault()      Sets the address as default for the customer
 *
 */
class CustomerAddress extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'address';

    /**
     * @inheritDoc
     */
    protected $customPutActions = array(
        'default' => 'makeDefault',
    );

    /**
     * @inheritDoc
     */
    protected function pluralizeKey()
    {
        return 'addresses';
    }


    /**
     * Perform bulk operations against a number of addresses
     *
     * @param array $params
     *
     * @return array
     */
    //TODO Issue (Getting Error from API) : Internal server error
    public function set($params)
    {
        $url = $this->generateUrl($params, 'set');

        return $this->put(array(), $url);
    }
}