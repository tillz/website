Title: Kanboard 1.0.23
Date: 2016-01-09
---

New features
------------

* Added support of user mentions (@username)
* Added report to compare working hours between open and closed tasks
* Added the possibility to define custom routes from plugins
* Added new method to remove metadata

Improvements
------------

* Improve Two-Factor activation and plugin API
* Improving performance during task position change (SQL queries are 3 times faster than before)
* Do not show window scrollbars when individual column scrolling is enabled
* Automatic Actions code improvements and unit tests
* Increase action name column length in "actions" table

Plugins
-------

* New plugins:
    - [Bitbucket Webhook](http://kanboard.net/plugin/bitbucket-webhook)
    - [Github Webhook](http://kanboard.net/plugin/github-webhook)
    - [Gitlab Webhook](http://kanboard.net/plugin/gitlab-webhook)
    - [SMS Two-Factor Authentication](http://kanboard.net/plugin/sms-2fa)
* Updated plugins:
    - [Budget](http://kanboard.net/plugin/budget)
    - [Hipchat](http://kanboard.net/plugin/hipchat)
    - [Mailgun](http://kanboard.net/plugin/mailgun)
    - [Postmark](http://kanboard.net/plugin/postmark)
    - [Sendgrid](http://kanboard.net/plugin/sendgrid)
    - [Timetable](http://kanboard.net/plugin/timetable)

Breaking changes
----------------

* Plugin API changes for Automatic Actions
* Automatic Action to close a task doesn't have the column parameter anymore (use the action "Close a task in a specific column")
* Action name stored in the database is now the absolute class name, **You may need to re-create your automatic actions**
* Core functionalities moved to external plugins:
    - Github Webhook: https://github.com/kanboard/plugin-github-webhook
    - Gitlab Webhook: https://github.com/kanboard/plugin-gitlab-webhook
    - Bitbucket Webhook: https://github.com/kanboard/plugin-bitbucket-webhook

Bug fixes
---------

* Fix compatibility issue with FreeBSD for session.hash_function parameter
* Fix wrong constant name that causes a PHP error in project management section
* Fix pagination in group members listing
* Avoid PHP error when enabling LDAP group provider with PHP < 5.5

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.23](http://kanboard.net/kanboard-1.0.23-fix1.zip)
- [How to upgrade Kanboard to a new version](http://kanboard.net/documentation/update)
