<?php

namespace Sterc\StatusOverrideIps\Processors\Ip;

use MODX\Revolution\Processors\Model\CreateProcessor;
use Sterc\StatusOverrideIps\Model\SoIP;

class Create extends CreateProcessor
{
    public $classKey = SoIP::class;
}
