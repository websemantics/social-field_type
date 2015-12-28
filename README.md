# Social Field Type

The social field type provides a dropdown input of social netwroks.

![demo](https://raw.githubusercontent.com/websemantics/social-field_type/master/resources/img/animation.gif)

This field type is using [Image-Select](https://github.com/websemantics/Image-Select), a select widget with image support for Single and Multi select HTML tags.

## Introduction

`websemantics.field_type.social`

The social field type provides a dropdown input of scoial accounts (facebook, youtube etc).

## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'websemantics.field_type.social',
            'config' => [
                'default_value' => 'facebook',
                'top_options'   => [
                    'facebook',
                    'youtube',
                    'twitter'
                ],
                'handler'       => 'Websemantics\SocialFieldType\SocialFieldTypeOptions@handle'
            ]
        ]
    ];

### `default_value`

The default social account selected. Any valid social account id can be used (i.e. 'twitter'). The default value is `'facebook'`. 

### `top_options`

An array of social accounts to put at the top of the scoial dropdown. Any array of social ids can be used. There are no top options by default.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Websemantics\SocialFieldType\SocialFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be set through the GUI configuration.

## Output

This field type returns the selected social account by default.

### `name()`

Returns the social account name

    // Twig Usage
    {{ entry.example.name }}
    
    // API usage
    $entry->example->name();

### `translated($locale = null)`

`$locale` - Any valid i18n language code. If none is provided the `config('app.locale')` value will be used.

Returns the translated social account name in a specified locale.

    // Twig Usage
    {{ entry.example.translated('es') }}
    
    // API usage
    $entry->example->translated('es');

# Credits

This plaugin was modeled after [Country Field Type](https://github.com/anomalylabs/country-field_type)
