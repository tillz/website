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

Build Docker image:

```bash
make docker-image
```

Start Docker container:

```bash
make docker-run
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

- `compatible_version` is the latest stable version tested with your plugin.
- `remote_install` allows people to install the plugin from the Kanboard user interface

Your plugin archive must contains a folder with the plugin name (namespace), example:

```
Registration-1.0.4.zip
└── Registration
    ├── Controller
    ├── Locale
    │   └── fr_FR
    ├── Template
    │   ├── ...
    ├── Test
    │   └── ...
    └── ...
```

The archive will be exctracted into the folder `plugins` to have `plugins/Registration`.
