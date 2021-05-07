<?php
/**
 * @author Arsenii Lozytskyi <manwe64@gmail.com>
 * Created at 04/15/18 02:25 PM UTC+03:00
 *
 * @see https://docs.shoplazza.com/api/reference/inventoryitem
 */

namespace PHPShoplazza;

class InventoryItem extends ShoplazzaResource
{
    /** @inheritDoc */
    protected $resourceKey = 'inventory_item';
}
