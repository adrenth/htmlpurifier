# Adrenth.HtmlPurifier

An October CMS plugin which adds a standards compliant HTML filter to October CMS.

HTML Purifier is an HTML filtering solution that uses a unique combination of robust whitelists and agressive parsing to ensure that not only are XSS attacks thwarted, but the resulting HTML is standards compliant.

## Installation

**CLI:**

`php artisan plugin:install Adrenth.HtmlPurifier`

**October CMS:**

Go to Settings > Updates & Plugins > Install plugins and search for 'HtmlPurifier'. 

## Configuration

To configure the filter execute this command:

````
php artisan vendor:publish --provider="Adrenth\HtmlPurifier\HtmlPurifierServiceProvider" --tag="config"
````

A configuration file named `config/htmlpurifier.php` is now created.

In depth information about configuration parameters can be found here: http://htmlpurifier.org/live/configdoc/plain.html

## Usage

Use the `|purify' in your Twig templates to apply the HTML Purifier filter.

````
{{ contentFromCms|purify }}

{{ contentFromExternalSource|purify }}
````

or

````
{{ '<a href="" target="_blank">Some random HTML string</a>'|purify }}
````

For more information about templating in October CMS: http://octobercms.com/docs/markup/templating
