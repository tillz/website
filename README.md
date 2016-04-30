Kanboard's website
==================

Build with PHP, Silex, Twig, Parsedown and [PicoFeed](https://github.com/fguillot/picoFeed).

Installation
------------

```bash
composer install
```

Usage
-----

Start PHP webserver on localhost:

```bash
make serve
```

API
---

### Get latest stable version

Request:

```
https://kanboard.net/version
```

Response:

```
{
    version: "1.0.27"
}
```

### Get the list of plugins


Request:

```
https://kanboard.net/plugins.json
```

How to add a new plugin to the list?
------------------------------------

Update the file `data/plugins.php` and send a pull-request.
