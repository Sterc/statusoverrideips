<?php
// Add your classes to modx's autoloader
$modx->addPackage('Sterc\StatusOverrideIps\Model', $namespace['path'] . 'src/', null, 'Sterc\\StatusOverrideIps\\');

// Register base class in the service container
$modx->services->add('statusoverrideips', function($c) use ($modx) {
    return new \Sterc\StatusOverrideIps\StatusOverrideIps($modx);
});

