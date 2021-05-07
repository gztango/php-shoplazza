<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 2:07 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/customersavedsearch Shoplazza API Reference for CustomerSavedSearch
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * CustomerSavedSearch -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Customer $Customer
 *
 * @method Customer Customer(integer $id = null)
 *
 */
class CustomerSavedSearch extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'customer_saved_search';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Customer',
    );

    /**
     * @inheritDoc
     */
    protected function pluralizeKey()
    {
        return 'customer_saved_searches';
    }
}