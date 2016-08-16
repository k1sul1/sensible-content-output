#Sensible content output

This plugin helps to keep your sanity when working with WordPress. At the moment it unwraps your inline images and removes the inline width declaration from figure elements embedded within content, to make your life easier.

[![Build Status](https://travis-ci.org/k1sul1/sensible-content-output.svg?branch=master)](https://travis-ci.org/k1sul1/sensible-content-output)

Installing
---
Easiest way to install is with composer:

`composer require k1sul1/sensible-content-output dev-master`

But you can also just download this repository as a .zip file, and install it like you normally would.

Customizing
---
If for some reason (I can think of plenty) you don't want to use all the features, you can easily filter the features like this:

```
add_filter("sco_enabled_features", function($features){
  // modify $features here
  return $features;
});
```

Contributing
---
Contributions welcome! Feature wishlist:

* Options page
