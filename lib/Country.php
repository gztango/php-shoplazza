<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 11:44 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/country Shoplazza API Reference for Country
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Country -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Province $Province
 *
 * @method Province Province(integer $id = null)
 *
 */
class Country extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'country';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Province',
    );

    /**
     * @inheritDoc
     */
    protected function pluralizeKey()
    {
        return 'countries';
    }
}