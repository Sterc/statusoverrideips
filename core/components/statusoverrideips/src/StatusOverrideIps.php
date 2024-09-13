<?php
namespace Sterc\StatusOverrideIps;

use MODX\Revolution\modX;

class StatusOverrideIps
{
    /** @var \MODX\Revolution\modX $modx */
    public $modx;

    public $namespace = 'statusoverrideips';

    /** @var array $config */
    public $config = [];

    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;

        $corePath   = $this->modx->getOption('statusoverrideips.core_path', $config, $this->modx->getOption('core_path')   . 'components/statusoverrideips/');
        $assetsUrl  = $this->modx->getOption('statusoverrideips.assets_url', $config, $this->modx->getOption('assets_url')  . 'components/statusoverrideips/');
        $assetsPath = $this->modx->getOption('statusoverrideips.assets_path', $config, $this->modx->getOption('assets_path') . 'components/statusoverrideips/');

        $this->config = array_merge([
            'namespace'       => $this->namespace,
            'core_path'       => $corePath,
            'model_path'      => $corePath . 'model/',
            'processors_path' => $corePath . 'processors/',
            'chunks_path'     => $corePath . 'elements/chunks/',
            'snippets_path'   => $corePath . 'elements/snippets/',
            'templates_path'  => $corePath . 'templates/',
            'assets_path'     => $assetsPath,
            'assets_url'      => $assetsUrl,
            'lexicons'        => ['statusoverrideips:default'],
            'js_url'          => $assetsUrl . 'js/',
            'css_url'         => $assetsUrl . 'css/',
            'connector_url'   => $assetsUrl . 'connector.php'
        ], $config);

        $this->modx->lexicon->load('statusoverrideips:default');
    }

    /**
     * Get a local configuration option or a namespaced system setting by key.
     *
     * @param  string  $key  The option key to search for.
     * @param  array  $options  An array of options that override local options.
     * @param  mixed  $default  The default value returned if the option is not found locally or as a
     * namespaced system setting; by default this value is null.
     *
     * @return mixed The option value or the default value specified.
     */
    public function getOption(string $key, $options = [], $default = null)
    {
        $option = $default;
        if (!empty($key) && is_string($key)) {
            if ($options != null && array_key_exists($key, $options)) {
                $option = $options[$key];
            } elseif (array_key_exists($key, $this->config)) {
                $option = $this->config[$key];
            } elseif (array_key_exists("{$this->namespace}.{$key}", $this->modx->config)) {
                $option = $this->modx->getOption("{$this->namespace}.{$key}");
            }
        }
        return $option;
    }
}
