Title: Kanboard 1.0.16
Date: 2015-06-28
---

Here are the last improvements made for this version:

More task colors
----------------

Now, there are 16 different colors available:

![More colors](https://kanboard.net/screenshots/news/1.0.16/more-colors.png)

Better time tracking for subtasks
---------------------------------

For each subtask, the timer can be stopped/started at any time:

![Subtask timer](https://kanboard.net/screenshots/documentation/subtask-timer.png)

The timer starts automatically when you toggle the subtask status.

You can always replace the value calculated by editing the subtask or ignore that if you don't need this feature.

The settings option to enable/disable subtask time tracking is removed. It's always enabled now.

[More information in the documentation](https://kanboard.net/documentation/time-tracking)

Improved email notifications
----------------------------

![Notifications](https://kanboard.net/screenshots/documentation/notifications.png)

It's now possible to filter the email notifications, instead of receiving all emails, you can choose between several configurations:

- All tasks
- Only for tasks assigned to you
- Only for tasks created by you
- Only for tasks created by you and assigned to you (the default now)

The email template for task updates have been improved to show the differences.

There is also a direct link to the board in the email footer if you have defined an application URL in your settings.

New mail transports
-------------------

It's now possible to send email with the HTTP API of Postmark, Sendgrid and Mailgun. Those integrations were already existing into Kanboard to receive incoming emails.

The main advantage of this method instead of the standard SMTP configuration is the speed. Opening SMTP sessions over TLS is slower than using a simple HTTPS request because the SMTP protocol is more verbose.

User RSS feeds
--------------

Like the iCal subscription, there is now a RSS feed by user. This subscription contains all activity events from the projects of the user.

Note: **The URL of project feed have changed**, don't forget to update your RSS reader.

Replacement of the chart drawing library
-----------------------------------------

![Cumulative flow diagram](https://kanboard.net/screenshots/documentation/cfd.png)

The Javascript library used too draw charts have been replaced by C3JS. Diagrams are easier to generate and they are looking better.

Update of the Bitbucket webhook
-------------------------------

Atlassian have updated the API of Bitbucket. Now, it's possible to receive commits, issues and comments from Bitbucket in Kanboard.

More automatic actions have been added, by example you can add a comment in Kanboard when you commit some changes related to a task.

Other improvements and fixes
----------------------------

### User interface

- Improve project navigation
- Improve assets loading: remove http call to load task colors and async load of app.js
- Display totals on the dashboard for tasks/subtasks/projects
- Add time estimated in the task board
- Improve tabindex for task forms
- Improve user creation form to automatically add project member and enable notifications
- Use CSS to truncate the page title instead truncating the text with PHP
- Change layout for automatic actions list
- Improve activity stream/notification for task update events

### User experience

- Auto assign subtasks when status is toggled
- Close all subtasks when a task is closed

### API

- API: new procedure 'removeAllFiles' and contract change for 'createFile'
- API: Add procedure 'getTaskByReference' and add 'reference' parameter for 'createTask/updateTask' methods
- API: Change parameters for updateTask, enforce the use of moveTaskPosition
- Add field for changes in webhook payload
- Allow sync of Github comments without common username

### Automatic actions

- Add automatic action to move a task to another column when the category is changed
- Add automatic action to send a task by email
- Improve automatic action to create comments based on commit messages

### Bug fixes

- Fix: normal user should not have inactive boards in board selector
- Fix bug: api exceptions can occurs with some versions of PHP
- Fix bug: Force edge mode for Internet Explorer
- Fix translations with incorrect placeholders
- Fix column width in compact mode

### Other

- Updated Polish, Russian, Spanish and Thai translations
- Add swimlane change notification and event
- Change comments table structure (drop foreign key on user_id)
- Move the script sync-locales.php to cli command
- Remove column default_project_id for users because it's useless now
- More documentation
- [PicoDb update](https://github.com/fguillot/picoDb)
- More unit tests

See you next time for a better Kanboard :)

[Download the version 1.0.16](https://kanboard.net/kanboard-1.0.16.zip)
