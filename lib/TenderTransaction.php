<?php

namespace PHPShoplazza;

class TenderTransaction extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'tender_transaction';

    /**
     * If the resource is read only. (No POST / PUT / DELETE actions)
     *
     * @var boolean
     */
    public $readOnly = true;
}
