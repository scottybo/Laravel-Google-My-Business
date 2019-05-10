# Laravel Google My Business

Note: To use the Google My Business API you have to apply for access: https://docs.google.com/forms/d/1XTQc-QEjsE7YrgstyJxbFDnwmhUhBFFvpNJBw3VzuuE/viewform

This is a Laravel ready implementation of the Google My Business PHP Library (v4.4) as provided by Google on https://developers.google.com/my-business/samples/

Please refer to https://developers.google.com/my-business/reference/rest/ for information on how the Google My Business API functions - more useful links are available at the bottom of this document.

## Installation

Run `composer require scottybo/laravel-google-my-business`

Or to install via composer - edit your composer.json to require the package.

"require": {
    "scottbo/laravel-google-my-business": "1.*"
}

Then run `composer update` in your terminal to pull it in.



## Laravel

**Important**: It's highly recommend you use https://github.com/pulkitjalan/google-apiclient to handle the Google Client setup. The code examples further down this document assume you're using this library.

To use this Google My Business package in a Laravel project add the following to the `providers` array in your `config/app.php`

```php
Scottybo\LaravelGoogleMyBusiness\GoogleMyBusinessServiceProvider::class,
```

Next add the following to the `aliases` array in your `config/app.php`

```php
'GoogleMyBusiness' => Scottybo\LaravelGoogleMyBusiness\GoogleMyBusiness::class
```

## Google My Business Discovery document

The Google My Business API discovery document is a JSON document that describes the surface for a particular version of the API. You use the discovery document in conjunction with the Google API Discovery Service.

`mybusiness_google_rest_v4p1.json` has been included with this project for your reference (downloaded from: https://developers.google.com/my-business/samples/)

**Tips**
 - For a guide on Google Discovery documents see: https://developers.google.com/discovery/v1/using#discovery-doc
 - A useful tool for browsing this massive document is: http://jsonviewer.stack.hu/
 - Join the discussion! https://www.en.advertisercommunity.com/t5/Google-My-Business-API/bd-p/gmb-api


## Code example
 
(Work in progress)

```php
use Google; // See: https://github.com/pulkitjalan/google-apiclient
use GoogleMyBusiness;


class MyExampleClass
{

    function authRedirect() {

        // Define the GMB scope
        $scopes = [
            'https://www.googleapis.com/auth/plus.business.manage'
        ];

        // Define any configs that overrride the /config/google.php defaults from pulkitjalan/google-apiclient
        $googleConfig = array_merge(config('google'),[
            'scopes' => $scopes,
            'redirect_uri' => config('app.callback_url').'/callback/google/mybusiness'
        ]);

        // Generate an auth request URL
        $googleClient = new Google($googleConfig);
        $loginUrl = $googleClient->createAuthUrl();
        
        // Send user to Google for Authorisation
        return redirect()->away($loginUrl);
    }
    
    function getAccountName(Google $googleClient) {
        $gmb = new GoogleMyBusiness($googleClient);
        return $gmb->getAccountName();
    }

}

```


## Useful links

Mostly for my reference as I develop this package, but you might find them useful too!

 - https://www.en.advertisercommunity.com/t5/Google-My-Business-API/Create-Post-with-My-Business-API/td-p/1704175
 - https://developers.google.com/api-client-library/php/start/get_started
 - https://developers.google.com/identity/protocols/OAuth2WebServer
 - https://developers.google.com/identity/protocols/googlescopes
 - https://developers.google.com/my-business/reference/rest/v4/accounts
 - https://developers.google.com/my-business/content/get-started
 - https://github.com/google/google-auth-library-php
 - https://github.com/pulkitjalan/google-apiclient/issues/23
