<?php

namespace Sterc\StatusOverrideIps\Processors\Ip;

use MODX\Revolution\Processors\Model\GetListProcessor;
use Sterc\StatusOverrideIps\Model\SoIP;

class GetList extends GetListProcessor
{
    public $classKey = SoIP::class;
    public $languageTopics = ['statusoverrideips:default'];
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'statusoverrideips.soip';
}
