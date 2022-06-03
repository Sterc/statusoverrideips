<?php

namespace Sterc\StatusOverrideIps\Processors\Ip;

use MODX\Revolution\Processors\Model\UpdateProcessor;
use Sterc\StatusOverrideIps\Model\SoIP;

class Update extends UpdateProcessor
{
    public $classKey = SoIP::class;
}
