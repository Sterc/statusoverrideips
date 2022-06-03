<?php

use Sterc\StatusOverrideIps\Model\SoIP;

/**
 * StatusOverrideIPs Plugin.
 * Only runs when site is unavailable. Checks if user is allowed (by IP) and changes site_status to true when he is.
 */
if ($modx->event->name === 'OnHandleRequest' && isset($modx->config['site_status']) && (int) $modx->config['site_status'] === 0) {
    if ($modx->getCount(SoIP::class, ['ip' => $_SERVER['REMOTE_ADDR']])) {
        $modx->config['site_status'] = 1;
    }
}
