# Social Publishing Platform

## Bugz

- [X] Category count in profile
- [X] Centered author name and avatar in post view

## ToDo

- [X] Create a new Laravel 10 project
- [X] Add Breeze

### Models

- [X] Users
- [X] Posts
- [X] Comments
- [X] Categories

### Migrations

- [X] Users
- [X] Posts
- [X] Comments
- [X] Categories
- [X] Category Posts Pivot

### Factories

- [X] Users
- [X] Posts
- [X] Comments
- [X] Categories

### User Registration/Authentication:

- [X] Users should be able to register an account and log in using Laravel’s built-in authentication
  system.
- [X] Only authenticated users can use the system (create, view, and interact with posts).

### Post Creation and Management:

- [ ] Posts
    - [X] Users should be able to Create their own posts.
    - [X] Users should be able to Read their own posts.
    - [ ] Users should be able to Update their own posts.
    - [X] Users should be able to Delete their own posts.
- [X] Each post should include:
    - [X] Title
    - [X] Content (text body)
    - [X] Creation Date and Time
    - [X] The Author’s Name (auto-assigned based on the logged-in user).
    - [X] Posts must be assigned to one or more predefined categories (many-to-many relationship). For example,
      categories might include "Technology," "Health," or "Lifestyle."
- [ ] Only the author of a post can edit or delete their own post.

### Categories:

- [X] Categories are predefined and cannot be edited or added by users.
- [X] Posts can belong to multiple categories (Many-to-Many relationship), and categories can
  include multiple posts.
- [X] Users should be able to filter posts in the main feed by category.
- [X] Have Uncategorized posts.

### Comments:

- [X] Users should be able to comment on posts.
- [ ] Only registered users can add or delete their own comments.
- [X] Comments must display the author’s name and the date/time they were posted.

### User Profile:

- [X] Each user should have a profile page where their own posts are displayed.
- [X] A profile page should only show posts created by the profile owner, ordered by the most
  recent.
- [X] Visitors to the profile should be able to see the author’s posts along with the assigned
  categories.

### Main Feed:

- [X] The main feed should display posts from all users, including the post's title, content preview,
  author’s name, categories
- [X] Posts show the number of comments.
- [X] Users should be able to filter posts by category and see posts from all categories by default.

### Search Functionality:

- [ ] Users should be able to search posts by keywords found in the post's title or content.
- [ ] The search results should include posts that match the search term in their title or body
  content.

## Description

Social Publishing Platform using Laravel 10

## Install

> [!NOTE]
> Don't forget migrations and artisan migrate

```bash
composer install
touch database/database.sqlite
php artisan migrate
npm install
```

## Technologies Used

- PHP/Laravel
- HTML
- CSS Tailwind
- JavaScript
- sqlite3

## Screenshots

![]()
