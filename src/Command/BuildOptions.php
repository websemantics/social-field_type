<?php

namespace Websemantics\SocialFieldType\Command;

use Websemantics\SocialFieldType\SocialFieldType;
use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;

/*
 * Class BuildOptions.
 *
 *
 * @link      http://websemantics.ca
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <adnan@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 */

class BuildOptions implements SelfHandling
{
    /**
     * The field type instance.
     *
     * @var SocialFieldType
     */
    protected $fieldType;

    /**
     * Create a new BuildOptions instance.
     *
     * @param SocialFieldType $fieldType
     */
    public function __construct(SocialFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Container $container
     */
    public function handle(Container $container)
    {
        $container->call(array_get($this->fieldType->getConfig(), 'handler'), ['fieldType' => $this->fieldType]);
    }
}
