# [ BINDER ]

### AUTOMATIC REVERSE RELATED PRODUCTS


#### Magento Version Compatibility
Magento Open Source 2.1, 2.2

## Overview

Binder is a simple extension that allows you automatic reverse linking of products in
related, cross-sell or up-sell. For example when we set manually for product A related
products: B and C, that product B and C has product A as related automatic. The
same principle also works when removing related products. This extension is useful,
for example, when we selling products of the same type such as music albums,
books or games and we want to set automatic related products for the same author.

### Installation


1) Download the Mware_Binder extension from the Magento Marketplace.
2) Unzip the file and put contents in app/code/ directory.
3) Run the following commands in an SSH console on the root directory Magento
server:
a) php bin/magento module:enable Mware_Binder
b) php bin/magento setup:upgrade
c) php bin/magento setup:static-content:deploy
4) Refresh the store cache.
5) Log out from the backend and log in again.
6) The extension should be ready to use.


### Configuration

1) Log in to admin panel.
2) Go to Stores >> Configuration >> Catalog >> Binder.
a) Select „yes” to apply automatic linking and deletion to related products.
b) Select „yes” to apply automatic linking and deletion to up-sell products.
c) Select „yes” to apply automatic linking and deletion to cross-sell products.
3) Save the configuration.

### Usage

For example, we set two related products for Bolo Sport Watch (Clamber Watch and
Didi Sport Watch) and click Save button.

From now products Didi Sport Watch and Clamber Watch have automatically Bolo
Sport Watch as a related product.


When we remove Bolo Sport Watch from Clamber Watch product, the reverse
removal is done automatically.

It works the same way for up-sell and cross-sell products.


### Support

If you have any question or problem with this extension feel free to send us an email.
support (@) mware.pl
