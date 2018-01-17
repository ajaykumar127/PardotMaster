
# Heroku Buildpack for WordPress

[![WordPress](http://technomile.github.io/img/heroku_wordpress.jpg)](http://www.technomile.com/capabilities/application-development/heroku/wordpress)

I've created a sample website that demonstrates how to build customer blog with [WordPress](http://www.wordpress.org) using its plugins [WP Google Analytics](https://wordpress.org/plugins/wp-google-analytics/), [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/), [Amazon S3 and Cloudfront](https://wordpress.org/plugins/amazon-s3-and-cloudfront/)

You can deploy your own version of WordPress running on MySQL on Heroku platform in seconds using the Heroku button below:

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/technomile/Heroku-WordPress-PostgreSQL)

## Overview

```
└── public                 # Heroku webroot
    ├── content            # The wp-content directory. Renamed to content to avoid confusion with wp-content - and it looks prettier
    │   ├── plugins        # Plugins
    │   ├── mu-plugins     # Required plugins
    │   └── themes         # Your custom themes
    │
    └── wp                 # Where the actual WordPress install will be installed by Composer
