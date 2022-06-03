<?php
namespace Sterc\StatusOverrideIps\Model\mysql;

use xPDO\xPDO;

class SoIP extends \Sterc\StatusOverrideIps\Model\SoIP
{

    public static $metaMap = array (
        'package' => 'Sterc\\StatusOverrideIps\\Model\\',
        'version' => '3.0',
        'table' => 'statusoverrideips_ips',
        'tableMeta' => 
        array (
            'engine' => 'InnoDB',
        ),
        'fields' => 
        array (
            'name' => '',
            'ip' => '',
        ),
        'fieldMeta' => 
        array (
            'name' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '255',
                'phptype' => 'string',
                'null' => true,
                'default' => '',
            ),
            'ip' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '46',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
        ),
    );

}
