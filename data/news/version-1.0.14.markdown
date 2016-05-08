Title: Kanboard 1.0.14
Date: 2015-05-02
---

Incoming emails handling
------------------------

You can create tasks directly by email now.
There are several methods to do that, I choose the easiest method to implement: using a third-party service.

Basically, you have the choice between 3 SMTP providers:

- [Mailgun](https://kanboard.net/documentation/mailgun)
- [Sendgrid](https://kanboard.net/documentation/sendgrid)
- [Postmark](https://kanboard.net/documentation/postmark)

These services handle incoming emails without having to configure any SMTP server.
Emails are received by Kanboard via a webhook.

[Documentation](https://kanboard.net/documentation/create-tasks-by-email)

Screenshots
-----------

It's now possible to insert a screenshot or copy and paste any image directly in Kanboard.
This feature is very useful for bug reports by example.

![Screenshot page](https://kanboard.net/screenshots/documentation/task-screenshot.png)

Note: **This feature doesn't works with all browsers**.

[Documentation](https://kanboard.net/documentation/screenshots)

Burndown chart
--------------

The burndown chart is available for each project.
This diagram is a graphical representation of work left to do versus time.

![Burndown chart](https://kanboard.net/screenshots/documentation/burndown-chart.png)

The sum of task complexity is recorded for each day.

[Documentation](https://kanboard.net/documentation/analytics)

Behaviour changes
-----------------

Daily project summaries include all tasks now, before it was only open tasks. Those data are used by the cumulative flow diagram.

Related Projects
----------------

[Kanboard Presenter by David Eberlein](https://github.com/davideberlein/kanboard-presenter)

The goal is to present all impotent projects of a development team on a TV screen and cycle them through to have an overview of what the current status is.

Other improvements
------------------

- Allow admins to disable the 2FA for a standard user
- Add Slack and Hipchat integrations for each projects
- Display the author in email notifications
- Notifications are sent with the language of the recipient
- Add category description that display a tooltip on the board
- Improve image thumbnails
- Display the sum of task complexity in the column
- Print CSS stylesheet for boards and tasks
- Updated translations
- Some code refactoring
- Better documentation
- Major bug fixes related to Windows Server support, columns and subtasks positions

Thanks to everybody!

[Download the version 1.0.14](https://kanboard.net/kanboard-1.0.14.zip)
