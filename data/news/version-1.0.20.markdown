Title: Kanboard 1.0.20
Date: 2015-10-24
---

The main change in this version is to externalize some core features to plugins.

The plugin API have been improved to allow the creation of new notification channels and the use of alternative email systems.

Those features are now separate plugins:

- Mailgun integration
- Sendgrid integration
- Postmark integration
- Slack notifications
- Hipchat notifications
- Jabber notifications

You can download them from the [plugins page](/plugins).

Breaking changes
----------------

- Add namespace Kanboard (update your plugins)
- ReverseProxy authentication check for each request that the username match the user session

New features
------------

* Add CSV import for users and tasks
* Add Task, User and Project metadata for plugin creators

Improvements
------------

* Allow to change comments sorting
* Add the possibility to append or not custom filters
* Make mail transports pluggable
* Do not show scroll-bars when a column is collapsed on Windows systems
* Regenerate thumbnails if missing

Bug fixes
---------

* People should not see any tasks during a search when they are not associated to a project
* Avoid to disable the default swimlane during renaming when there is no other activated swimlane

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.20](https://kanboard.net/kanboard-1.0.20.zip)
