Title: Kanboard 1.0.22
Date: 2015-12-13
---

This new release introduce a new authentication and authorization architecture.
A lot of code refactoring has been made to have an extensible and flexible system.
It's now possible to write plugins to propose alternative authentication backends.

[Read the documentation to create authentication plugins](https://kanboard.net/documentation/plugins)

Groups and Teams
----------------

With Kanboard, a group of people is like a team.
Each user can be assigned to one or multiple groups.
Then each project manager can authorize projects access to a group while assigning a specific role for the project.

More over, a new project role have been created "Project Viewer", these users only have read-only access to the project.

Enterprises that use Kanboard can also configure the [LDAP groups synchronization](https://kanboard.net/documentation/ldap-group-sync).

[Read the documentation about groups](https://kanboard.net/documentation/groups)

New Features
------------

* Add pluggable authentication and authorization system (complete rewrite)
* Add groups (teams/organization)
* Add LDAP groups synchronization
* Add project group permissions
* Add new project role "Viewer"
* Add generic LDAP client library
* Add search query attribute for task links
* Add the possibility to define API token in config file
* Add capability to reopen Gitlab issues
* Try to load config.php from /data if not available

New Plugins
-----------

- [Reverse-Proxy Authentication with LDAP user provider](https://kanboard.net/plugin/reverse-proxy-ldap)

Note: Do not forget to update your plugins.

Breaking Changes
----------------

* The [user roles nomenclature has been changed](https://kanboard.net/documentation/roles)
* LDAP configuration parameters changes ([See documentation](https://kanboard.net/documentation/ldap-parameters))
* SQL table changes:
    - "users" table: added new column "role" and removed columns "is_admin" and "is_project_admin"
    - "project_has_users" table: replaced column "is_owner" with column "role"
    - Sqlite does not support alter table, old columns still there but unused
* API procedure changes:
    - createUser
    - createLdapUser
    - updateUser
    - updateTask
* Event removed: "session.bootstrap", use "app.boostrap" instead

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.22](https://kanboard.net/kanboard-1.0.22.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
