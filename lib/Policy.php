<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 6:22 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/policy Shoplazza API Reference for Policy
 */

namespace PHPShoplazza;


class Policy extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'policy';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;

    /**
     * @inheritDoc
     */
    public $readOnly = true;

    /**
     * @inheritDoc
     */
    public function pluralizeKey()
    {
        return 'policies';
    }
}