<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 6:05 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/multipass Shoplazza API Reference for Multipass
 */

namespace PHPShoplazza;


use PHPShoplazza\Exception\ApiException;

class Multipass extends ShoplazzaResource
{

    /**
     * Multipass constructor.
     *
     * @param integer $id
     *
     * @throws ApiException
     */
    public function __construct($id = null)
    {
        throw new ApiException("Multipass API is not available yet!");
    }
}