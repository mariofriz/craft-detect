craft-detect
============

A simple Craft plugin that adds some classes to the body tag for browser, os etc..

## Install

* Download the zip from releases
* Unzip in your craft/plugins folder
* Make sure the plugin folder is called **detect**

## Usage

After enabling the plugin in the Craft admin, add this in your template(s):

```php
<body class="{{ craft.detect.display }}">
```
