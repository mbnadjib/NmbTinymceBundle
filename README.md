NmbTinymceBundle
================

Integrate TinyMCE 4.x editor into symfony2

## Installation

Add NmbTinymceBundle to your composer.json

```js
{
    "require": {
        "nmb/tinymce-bundle": "dev-master"
    }
}
```

Download the bundle by runung the command
``` bash
$php composer.phar update nmb/tinymce-bundle
```

Add the bundle to your app/AppKernel.php
``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Nmb\TinymceBundle\NmbTinymceBundle(),
    );
}
```

## Configuration
You can add as many configurations as you want under nmb_tinymce key, name it as you want, and choose witch one you want to use on every tinymce instance.
refer to tinymce documentation for the configuration itself: http://www.tinymce.com/wiki.php/Installation
``` yaml
# app/config/config.yml
nmb_tinymce:
    my_basic_config:
        selector: textarea
    advenced_config:
        selector: "textarea#elm1"
        theme: "modern"
        width: 300
        height: 300
        plugins: ["advlist autolink link image lists","searchreplace wordcount visualblocks code","save table contextmenu directionality textcolor"]
        content_css: "css/content.css"
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons"
        style_formats: [ [title: 'Bold text', inline: 'b'], [title: 'exmample 2', inline: 'span', styles: [color: '#fff000']] ]      
    other_config:
        ...
```

## Usage
In your twig template 
``` twig
{{ nmb_tinymce_init('my_config_key') }}
```
