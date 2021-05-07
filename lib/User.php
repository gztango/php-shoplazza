<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 8:00 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/user Shoplazza API Reference for User
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * User -> Custom actions
 * --------------------------------------------------------------------------
 * @method array current()      Get the current logged-in user
 *
 */
class User extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'user';

    /**
     * @inheritDoc
     */
    public $readOnly = true;

    /**
     * @inheritDoc
     */
    protected $customGetActions = array (
      'current'
    );
}