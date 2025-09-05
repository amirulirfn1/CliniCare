# Contributing to CliniCare

Thank you for considering contributing to CliniCare! The following guidelines help maintain consistency and quality across the project.

## Branching strategy

- The `main` branch contains production-ready code.
- Create dedicated feature branches from `main` for all work (`feature/<name>` or `bugfix/<name>`).
- Open a pull request to merge your branch back into `main` once work is complete.

## Coding Standards

- Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding style for PHP.
- Use 4 spaces for indentation.
- Write meaningful commit messages in the present tense (e.g., "add login page").

## Commit messages

- Use descriptive commit messages that explain the intent of the change.
- Break large changes into multiple commits when appropriate.

## Testing

- Run available tests before submitting a pull request. If no automated tests exist, manually verify that your changes work as expected.
- Ensure pages load without PHP errors or warnings. You can lint PHP files using:
  ```bash
  php -l path/to/file.php
  ```

## Pull requests

- Provide a clear title and summary describing the change.
- Link related issues or discussions.
- Ensure all checks pass and request a review from a project maintainer.
- Run tests and ensure your branch is up to date with `main`.

## Branch protection and reviews

- Direct pushes to `main` are restricted; all changes must come through pull requests.
- Merging requires at least one approving review.
- Protected branches require all status checks to pass before merging.

We appreciate all contributions and reviews!
