Title: Introducing a new release process
Date: 2016-06-09
---

In order to improve the quality of the software, the release process will change from Kanboard v1.0.30.

Predictable Release Date
------------------------

On the first week of each month, a new stable version of Kanboard will be released.

Beta Channel
------------

The Git repository contains 3 branches:

- `master` is the development branch
- `beta` is the pre-release branch
- `stable` branch

Before to publish a new version, the development branch (master) is merged into the beta branch.
In this way, contributors can test the application before the final release.

The [Semantic Versioning](http://semver.org) will be used, for example the first release in the beta channel will be `1.0.31-beta0`.
If a regression is found, a new tag will be created `1.0.31-beta1` when the issue will be fixed.

Finally, when the software is ready to be released, the beta branch is merged into the stable branch and the tag `1.0.31` is created.
The new version will be announced on the website ([RSS Feed](https://kanboard.net/feed)), [Twitter](https://twitter.com/KanboardApp) and with the newsletter.

Docker Images
-------------

There are several tags for the Docker images:

- `latest` is an automated build that represents the development branch
- `stable` is the latest stable version
- `beta` is the latest beta version
- `v1.0.x` is an automated build of each release, in case of a regression, you can easily do a rollback to a previous version

This process have been inspired by the open source projects [Gitlab](https://about.gitlab.com/2015/12/07/why-we-shift-objectives-and-not-release-dates-at-gitlab/) and [Atom](http://blog.atom.io/2015/10/21/introducing-the-atom-beta-channel.html).
