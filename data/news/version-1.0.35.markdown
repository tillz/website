Title: Kanboard 1.0.35
Date: 2016-12-04
---

New features
------------

* Add external tasks plugin interfaces
* Add personal API access token for users
* Rewrite of Markdown editor (remove CodeMirror)
* Suggest menu for task ID and user mentions in Markdown editor
* Add config parameter to disable automatic SQL migrations

Improvements
------------

* Add button to close inline popups
* Simplify `.htaccess` to avoid potential issues with possible specific Apache configurations
* Replace notifications Javascript code by CSS
* Refactoring of user mentions job
* Remove Nitrous installer
* Update translations
* Rewrite some components in Vanilla Javascript
* Started Javascript code refactoring to avoid to much dependencies on jQuery
* Remove dependency on VueJS and CoreMirror
* Add P3P headers to avoid potential issues with IE

Bug fixes
---------

* Change column type for application settings value (field too small)
* Fix link generation when user mention is followed by a punctuation mark
* Make user mentions works again

Breaking changes
----------------

* Rename command line tool `./kanboard` to `./cli`

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.35](https://kanboard.net/kanboard-1.0.35.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
