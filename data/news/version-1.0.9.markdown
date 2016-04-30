Title: Kanboard 1.0.9 is released
Date: 2014-11-01
---

### New features

- Add a dashboard (first draft)
- Users are able to create [private projects](/documentation/creating-projects)
- Add support for [Github Webhooks](/documentation/github-webhooks)
- Redirect to the original page after login/session expiration
- Regular users can remove only their own tasks
- Allow quickly creating and changing state of subtask
- Add 3 new fields for tasks: start date, time estimated and time spent
- Add pagination/column sorting for search, completed tasks and users listing page
- Project activity have been rewritten to be more efficient
- Kanboard can run with [Docker](/documentation/docker)
- Add icons and shortcuts to the board
- Input date format is now a config parameter instead of the current locale
- New translations: Danish, Thai and Japanese

### Improvements

- The behaviour of [project permissions](/documentation/project-permissions) is modified: projects are not anymore visible to everybody by default, you can still allow the access to everbody
- Improve settings page and move some config parameters to the database
- The logged user is excluded from email notifications
- Notifications are only sent to project members
- Hide users menu for non-admins
- Improve automatic actions (check for compatible events/actions/parameters)
- Allow public board iframe inclusion
- Add configuration option to enable/disable `Strict-Transport-Security` HTTP header
- Replace Markdown parser by [Parsedown](http://parsedown.org/)
- Add a [contributor guide](/documentation/contributing)
- Change Vagrant config to have [multiple boxes](/documentation/vagrant)
- Improve code quality by reducing the code complexity
- Bug fixes

### Focus for the next version

- Improve the user interface to be more efficient
- Start to implement some reportings

[Download](/kanboard-1.0.9.zip)