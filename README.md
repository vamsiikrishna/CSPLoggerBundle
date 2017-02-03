# Intro to SockamCSPLoggerBundle
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9c916ced-0f13-4c81-9017-32d7496f1cf5/big.png)](https://insight.sensiolabs.com/projects/9c916ced-0f13-4c81-9017-32d7496f1cf5)

The SockamCSPLoggerBundle provides a basic service for logging  [content security policy](https://developer.mozilla.org/en-US/docs/Security/CSP) violations.

#Features
- Saving CSP violations
- Viewing the saves CSP violations

## Installation
### Get the bundle

Add `sockam/csp-logger-bundle` to your dependencies:

``` json
{
    "require": {
        ...
        "sockam/csp-logger-bundle": "^0.1.0"
    }
    ...
}
```

To install, run `php composer.phar [update|install]`.

### Add CSPLoggerBundle to your application kernel

``` php
<?php

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Sockam\CSPLoggerBundle\SockamCSPLoggerBundle(),
            // ...
        );
    }
```
### Import the routing configuration

Add to your `routing.yml`:

``` yml
# app/config/routing.yml
sockam_csp_logger:
    resource: "@SockamCSPLoggerBundle/Resources/config/routing.yml"
    prefix:   /csp
```

You can customize the prefix as you wish.

### Update your database schema:

``` shell
$ php bin/console doctrine:schema:update --force
```




You can now use `/csp/log` endpoint in your CSP headers: 
You can now access the dashboard at this url: `/csp/logs`

To secure the CSP violations viewer, you can add the following to your `security.yml` - provided your administrator role is `ROLE_ADMIN`

```yml
    access_control:
        - { path: ^/csp/logs, roles: ROLE_ADMIN }
```

Now only users with the role ROLE_ADMIN will be able to access the CSP violations viewer at this url: `/csp/logs`




## Screenshots
### Violations viewer
![CSP Violations Log Viewer](https://i.imgur.com/hpdszjP.png)


