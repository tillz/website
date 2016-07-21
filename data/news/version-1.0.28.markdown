Title: Kanboard 1.0.28
Date: 2016-05-08
---

New features
------------

* Added automated action to change task color based on the priority
* Added support for [LDAP Posix Groups (OpenLDAP with memberUid or groupOfNames)](https://kanboard.net/documentation/ldap-configuration-examples)
* Added support for [LDAP user photo attribute (Avatar image)](https://kanboard.net/documentation/ldap-profile-picture)
* Added support for language LDAP attribute
* Added support for Mysql SSL connection
* Search in activity stream
* Search in comments
* Search by task creator
* Added command line utility to reset user password and to disable 2FA

Improvements
------------

* Improve Avatar upload form
* User roles are now synced with LDAP at each login
* Improve web page title on the task view
* Unify task drop-down menu between different views
* Improve LDAP user group membership synchronization
* Category and user filters do not append anymore in search field
* Added more template hooks
* Added tasks search with the API
* Added priority field to API procedures
* Added API procedure "getMemberGroups"
* Added parameters for overdue tasks notifications: group by projects and send only to managers
* Allow people to install Kanboard outside of the DocumentRoot
* Allow plugins to be loaded from another folder
* Filter/Lexer/QueryBuilder refactoring

Plugins
-------

All plugins must be updated.

Bug fixes
---------

* Allow a project owner to manage his own public project
* Fixed PHP warning when removing a user with no Avatar image
* Fixed improper Markdown escaping for some tooltips
* Closing all tasks by column, also update closed tasks
* Fixed wrong task link generation within Markdown text
* Fixed wrong URL on comment toggle link for sorting
* Fixed form submission with Meta+Enter keyboard shortcut
* Removed PHP notices in comment suppression view

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.28](https://kanboard.net/kanboard-1.0.28.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
