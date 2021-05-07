<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 10:46 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/theme Shoplazza API Reference for Theme
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Theme -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Asset $Asset
 *
 * @method Asset Asset(integer $id = null)
 *
 */
class Theme extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $resourceKey = 'theme';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Asset'
    );
}