<?php
abstract class StatusOverrideIpsBaseManagerController extends modExtraManagerController
{
    /** @var \Sterc\StatusOverrideIps\statusoverrideips $statusoverrideips */
    public $statusoverrideips;

    public function initialize(): void
    {
        $this->statusoverrideips = $this->modx->services->get('statusoverrideips');

        $this->addCss($this->statusoverrideips->getOption('css_url') . 'mgr.css');
        $this->addJavascript($this->statusoverrideips->getOption('js_url') . 'mgr/statusoverrideips.js');

        $this->addHtml('
            <script type="text/javascript">
                Ext.onReady(function() {
                    StatusOverrideIps.config = '.$this->modx->toJSON($this->statusoverrideips->config).';
                });
            </script>
        ');

        parent::initialize();
    }

    public function getLanguageTopics(): array
    {
        return ['statusoverrideips:default'];
    }

    public function checkPermissions(): bool
    {
        return true;
    }
}
