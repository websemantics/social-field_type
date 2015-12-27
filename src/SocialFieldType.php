<?php

namespace Websemantics\SocialFieldType;

use Websemantics\SocialFieldType\Command\BuildOptions;

/*
 * Class SocialFieldType.
 *
 *
 * @link      http://websemantics.ca
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <adnan@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 */

class SocialFieldType extends \Anomaly\Streams\Platform\Addon\FieldType\FieldType
{
    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'websemantics.field_type.social::input';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'websemantics.field_type.social::filter';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'default_value' => 'facebook',
        'handler' => 'Websemantics\SocialFieldType\SocialFieldTypeOptions@handle',
    ];

    /**
     * The dropdown options.
     *
     * @var null|array
     */
    protected $options = null;

    /**
     * Get the countries.
     *
     * @return array
     */
    public function getOptions()
    {
        if ($this->options === null) {
            $this->dispatch(new BuildOptions($this));
        }

        $topOptions = array_get($this->getConfig(), 'top_options');

        if (!is_array($topOptions)) {
            $topOptions = array_filter(array_reverse(explode("\r\n", $topOptions)));
        }

        foreach ($topOptions as $iso) {
            if (isset($this->options[$iso])) {
                $this->options = [$iso => $this->options[$iso]] + $this->options;
            }
        }

        return array_unique($this->options);
    }

    /**
     * Set the options.
     *
     * @param array $options
     *
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return $this->placeholder ?: 'websemantics.field_type.social::input.placeholder';
    }
}
