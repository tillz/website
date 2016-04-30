Title: Kanboard 1.0.27
Date: 2016-03-27
---

New features
------------

* Added Markdown editor
* Added user avatars with pluggable system
    - Default is a letter based avatar
    - Gravatar
    - Avatar Image upload
* Added Korean translation

Improvements
------------

* Added more logging for LDAP client
* Improve schema migration process
* Improve notification configuration form
* Handle state in OAuth2 client
* Allow to use the original template in overridden templates
* Unification of the project header
* Refactoring of Javascript code
* Improve comments design
* Improve task summary sections
* Put back the action sidebar in task view
* Added support for multiple placeholders for LDAP_USER_FILTER
* Added local file link provider
* Show configuration in settings page
* Added "?" to display list of keyboard shortcuts
* Added new keyboard shortcuts for task view
* Always display project name and task title in task views
* Improve automatic action creation
* Move notifications to the bottom of the screen
* Added the possibility to import automatic actions from another project
* Added Ajax loading icon for submit buttons
* Added support for HTTP header "X-Forwarded-Proto: https"

Plugins
-------

* New plugins:
    - [Self-Registration](http://kanboard.net/plugin/registration)
    - [SSL Client Certificate authentication](http://kanboard.net/plugin/client-certificate)

* Updated plugins:
    - [Google Authentication](http://kanboard.net/plugin/google-auth) (Updated API endpoints and added avatar provider)
    - [Reverse-Proxy Authentication with LDAP](http://kanboard.net/plugin/reverse-proxy-ldap)
    - [Timetable](http://kanboard.net/plugin/timetable)

Bug fixes
---------

* Fix bad unique constraints in Mysql table user_has_notifications
* Force integer type for aggregated metrics (Burndown chart concat values instead of summing)
* Fixes cycle time calculation when the start date is defined in the future
* Access allowed to any tasks from the shared public board by changing the URL parameters
* Fix invalid user filter for API procedure createLdapUser()
* Ambiguous column name with very old version of Sqlite

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.27](http://kanboard.net/kanboard-1.0.27.zip)
- [How to upgrade Kanboard to a new version](http://kanboard.net/documentation/update)
