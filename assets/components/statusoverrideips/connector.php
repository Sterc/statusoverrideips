<?php

require_once dirname(__DIR__, 3) . '/config.core.php';

require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

if ($modx->services->has('statusoverrideips')) {
    $service = $modx->services->get('statusoverrideips');

    $modx->request->handleRequest([
        'processors_path'   => $service->config['processors_path'],
        'location'          => ''
    ]);
}
