<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 6:30 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/recurringapplicationcharge Shoplazza API Reference for RecurringApplicationCharge
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * RecurringApplicationCharge -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read UsageCharge $UsageCharge
 *
 * @method UsageCharge UsageCharge(integer $id = null)
 *
 * --------------------------------------------------------------------------
 * RecurringApplicationCharge -> Custom actions
 * --------------------------------------------------------------------------
 * @method array activate()             Activate a recurring application charge
 *
 */
class RecurringApplicationCharge extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'recurring_application_charge';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'UsageCharge',
    );

    /**
     * @inheritDoc
     */
    protected $customPostActions = array(
        'activate',
    );

    /*
     * Customize a recurring application charge
     *
     * @param array $data
     *
     * @return array
     *
     */
    public function customize($dataArray)
    {
        $dataArray = $this->wrapData($dataArray);

        $url = $this->generateUrl($dataArray, 'customize');

        return $this->put(array(), $url);
    }
}