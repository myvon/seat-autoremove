# seat-rules
A module for [SeAT](https://github.com/eveseat/seat) that automatically remove users that left your corporation

[![License](https://img.shields.io/badge/license-GPLv2-blue.svg?style=flat-square)](https://raw.githubusercontent.com/myvon/seat-autoremove/master/LICENSE)

If you have issues with this, you can contact me on Eve as **Pregma**

## Quick Installation:

In your seat directory type the following:

```
php artisan down
composer require lvlo/seat-autoremove

php artisan vendor:publish --force --all
php artisan migrate

php artisan up
```

And now, when you log into 'Seat', you should see a 'Autoremove' link on the left to configure it.

