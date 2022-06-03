<?php

namespace Sterc\StatusOverrideIps\Processors\Ip;

use MODX\Revolution\Processors\Model\RemoveProcessor;
use Sterc\StatusOverrideIps\Model\SoIP;

class Remove extends RemoveProcessor
{
    public $classKey = SoIP::class;
}
