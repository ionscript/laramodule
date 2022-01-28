# Versioning Strategy

## About
`laramodule` uses a [Semantic Versioning 2.0][semver] for all changes to the Frontoffice Application.
> It is strongly encouraged that you pin the major, minor and patch version.

## Summary

Semantic Versions take the form of `MAJOR.MINOR.PATCH`, increment the:

1. `PATCH` version when you make backwards compatible bug fixes,
2. `MINOR` version when you add functionality in a backwards compatible manner, and
3. `MAJOR` version when you make incompatible API changes.

> Additional labels for `Rre-Release` and build metadata are available as extensions to the `MAJOR.MINOR.PATCH` format.

## Strategy

- When bugs are fixed or new small features are added, the `PATCH` level will be incremented by one.
- When a new large feature set comes online or a small breaking change is introduced, the `MINOR` version will be incremented by one and the `PATCH` version reset to zero.
- When the `MAJOR` version to be incremented by one, the `MINOR` and `PATCH` versions will be reset to zero. 

> New `MAJOR` versions should be communicated with `Release Candidates`.

[semver]: https://semver.org