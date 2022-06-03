<?php
require_once dirname(__FILE__, 2) . '/index.class.php';

class StatusOverrideIpsHomeManagerController extends StatusOverrideIpsBaseManagerController
{

    public function process(array $scriptProperties = []): void
    {
    }

    public function getPageTitle(): string
    {
        return $this->modx->lexicon('statusoverrideips');
    }

    public function loadCustomCssJs(): void
    {
        $this->addJavascript($this->statusoverrideips->getOption('js_url') . 'mgr/widgets/ips.grid.js');
        $this->addJavascript($this->statusoverrideips->getOption('js_url') . 'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->statusoverrideips->getOption('js_url') . 'mgr/sections/index.js');
    }

    public function getTemplateFile(): string
    {
        return $this->statusoverrideips->getOption('templatesPath') . 'home.tpl';
    }
}
