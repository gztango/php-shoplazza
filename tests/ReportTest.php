<?php

namespace PHPShoplazza;

class ReportTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "name" => "A new app report",
        "shoplazza_ql" => "SHOW total_sales BY country FROM order SINCE -1m UNTIL today ORDER BY total_sales",
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "name" => "A new app report - updated",
    );
}