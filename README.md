# HubKit

This repo contains a customised version of [Park-Manager HubKit](https://github.com/park-manager/hubkit) originally
created by [Sebastiaan Stok](https://github.com/sstok), used for Sylius merge and release processes.
Please use the original repository for contributing.

## Requirements

You need at least PHP 7.1, Git 2.10 and a GitHub account (GitHub Enterprise is possible).
Composer is assumed to be installed and configured in your PATH.

## Installation

HubKit is a PHP application, you don't install it as a dependency
and you don't install it with Composer global.

To install HubKit first choose a directory where you want to keep the installation.
Eg. `~/.hubkit` or any of your choice.

**Caution:** Make sure you don't use a directory that is accessible by
others (like the web server root) as this may expose your API access-token!

Download HubKit by cloning the repository:

```bash
mkdir ~/.hubkit
cd ~/.hubkit
git clone https://github.com/sylius/hubkit.git .
```

And install the dependencies:

```bash
./bin/install
```

### Updating

Updating HubKit is very easy. Go to the HubKit installation
directory, and run `./bin/upgrade`.

Done, you now have the latest version.

## Basic usage

Run `hubkit help` for a full list of all available commands and options.

**Note:** All commands except `help`, `repo-create` and `self-diagnose` require
you are in a Git repository, and have Git remote `upstream` existing and pointing
to the GitHub head repository (from which all work is coordinated, not your fork).

## License

HubKit is provided under the [MIT license](LICENSE).

## Credits

The original project is maintained by Sebastiaan Stok (aka. [@sstok](https://github.com/sstok)),
creator of Park-Manager.

HubKit was inspired on the GH Tool used by the Symfony maintainers,
no actual code from GH was used.

HubKit is not to be confused with [Hub](https://hub.github.com/) (from GitHub).
