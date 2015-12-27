<?php

namespace Websemantics\SocialFieldType;

/*
 * Class SocialFieldTypeOptions.
 *
 *
 * @link      http://websemantics.ca
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <adnan@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 */

class SocialFieldTypeOptions
{
    /**
     * Handle the options.
     *
     * @param SocialFieldType $fieldType
     */
    public function handle(SocialFieldType $fieldType)
    {
        $countries = config('websemantics.field_type.social::accounts');

        $names = array_map(
            function ($id) {
                return 'websemantics.field_type.social::account.'.$id;
            },
            $countries
        );

        $options = array_combine($countries, $names);

        asort($options);

        $fieldType->setOptions($options);
    }
}
