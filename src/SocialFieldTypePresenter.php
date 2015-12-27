<?php

namespace Websemantics\SocialFieldType;

/*
 * Class SocialFieldTypePresenter.
 *
 *
 * @link      http://websemantics.ca
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <adnan@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 */

class SocialFieldTypePresenter extends \Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter
{
    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var SocialFieldType
     */
    protected $object;

    /**
     * Get the country name.
     *
     * @return null|string
     */
    public function name()
    {
        if (!$key = $this->object->getValue()) {
            return;
        }

        return trans(array_get($this->object->getOptions(), $key));
    }

    /**
     * Return the translated country name.
     *
     * @param null $locale
     *
     * @return null|string
     */
    public function translated($locale = null)
    {
        if (!$key = $this->object->getValue()) {
            return;
        }

        return trans('websemantics.field_type.country::country.'.$key, [], $locale);
    }
}
