<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 9:50 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/applicationcharge Shoplazza API Reference for ApplicationCharge
 */

namespace PHPShoplazza;


class ApplicationCharge extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'application_charge';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;
    
    // To activate ApplicationCharge
    protected $customPostActions = array(
       'activate',
   );
}
