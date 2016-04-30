Title: Kanboard 1.0.10 is released
Date: 2014-12-06
---

## New design

Kanboard got a lifting with this new version:

![Board](/screenshots/news/1.0.10/board.png)

Some sections have been moved to focus on the most used features.

Improvements on the user interface are never done.
The goal is to have a software that will be more efficient and more robust after each iteration.

## Improved dashboard

Projects and subtasks with sorting and pagination have been added to the dashboard:

![Dashboard](/screenshots/news/1.0.10/dashboard.png)

## Analytics

This version introduce 3 new graphs:

- Tasks distribution
- Users repartition
- Cumulative flow diagram

![Analytics](/screenshots/news/1.0.10/analytics.png)

## Minor improvements

- Tooltips on the board
- Markdown preview for tasks and comments
- New export: Project daily summaries
- Improvements for single users
- The API return the id of created elements and some procedures have been added
- Several translations updated
- Add support for LDAP START-TLS

## Code refactoring and more unit tests

- Kanboard use [Composer](https://getcomposer.org/) to manage the dependencies.
- More unit tests have been written to improve the reliability
- A lot of code refactoring have been made to reduce the complexity and improve the maintainability
- Templates are organized into sub-folders now
- The command line tool use the package `Symfony\Console`
- Debug logs are sent to Syslog and `data/debug.log` with `Monolog`
- Of course, many bugs have been fixed

## Change about the minimum requirements

The version 1.0.10 requires at least **PHP 5.3.7**.
That means a default PHP installation on [Debian 6 Squeeze](/documentation/debian-installation) are not supported anymore.

Note: I don't maintain anymore the official Docker image on Docker Hub.
However you can always [build your own image](/documentation/docker) from the repository.

## Focus for the next version

- Add swimlanes
- Gitlab webhooks
- Continue to improve everything else

[Download the version 1.0.10](/kanboard-1.0.10.zip)

Thanks to all contributors!
