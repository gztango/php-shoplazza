<?php
/**
 * @author Arsenii Lozytskyi <manwe64@gmail.com>
 * Created at 04/15/18 02:31 PM UTC+03:00
 *
 * @see https://docs.shoplazza.com/api/reference/inventorylevel
 */

namespace PHPShoplazza;

/**
 * Class InventoryLevel
 *
 * @method array adjust($data)  Adjust inventory level.
 * @method array connect($data) Connect an inventory item to a location.
 * @method array set($data)     Sets an inventory level for a single inventory item within a location.
 */
class InventoryLevel extends ShoplazzaResource
{
    /** @inheritDoc */
    protected $resourceKey = 'inventory_level';

    /** @inheritDoc */
    protected $customPostActions = [
        'adjust',
        'connect',
        'set',
    ];
}
