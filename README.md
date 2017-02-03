# emailTrack.php

**A class to generate Google Analytics tracking pixels [<sup>1</sup>](https://developers.google.com/analytics/devguides/collection/protocol/v1/email) for html email and "view email in the browser" pages.**

This class can be used in html static generators or programs to generate tracking pixels.

### How to use

The file `demo.php` contains some examples on how to use the class to generate pixels.

Inside the `./snippets/` folder there's also example code.

### Configure to add data to your Google Analytics account / propriety

1 - Modify `$GAtrackingID` in `emailTrack.php` to your Google Analytics tracking ID. In the example: `UA-7467053-1`

```php
public $GAtrackingID = 'UA-7467053-1';
```

2 - Define the field to retrieve the user id from Engaging Networks (or other email sending providers that have similar features). In the example bellow the user ID field is `cp_supporter_id`

```php
public $supporterID = '{user_data~cp_supporter_id}';
```

**Important:** Google forbids using any data that allows them to identify a user, including email, phone number or name. Please check their policies for more information.

**Note:** At the moment it’s not possible to use the field `Supporter ID`. As a temporary hack I’ve made a copy named `cp_supporter_id`. Unlike `Supporter ID`, `cp_supporter_id` is not automatically populated in new records. I believe this issue will be fixed in the next 3 months.
