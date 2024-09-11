# Social Publishing Platform

## ToDo

- [X] Create a new Laravel 10 project
- [X] Add Breeze

### Models

- [X] Users
- [X] Posts
- [ ] Comments
- [ ] Categories

### User Registration/Authentication:

- [ ] Users should be able to register an account and log in using Laravel’s built-in authentication
  system.
- [ ] Only authenticated users can use the system(create, view, and interact with posts).

### Post Creation and Management:

- [ ] Users should be able to Create, Read, Update, and Delete their own posts.
- [ ] Each post should include:
    - [ ] Title
    - [ ] Content (text body)
    - [ ] Creation Date and Time
    - [ ] The Author’s Name (auto-assigned based on the logged-in user).
    - [ ] Posts must be assigned to one or more predefined categories (many-to-many relationship). For example,
      categories might include "Technology," "Health," or "Lifestyle."
- [ ] Only the author of a post can edit or delete their own post.

### Categories:

- [ ] Categories are predefined and cannot be edited or added by users.
- [ ] Posts can belong to multiple categories (Many-to-Many relationship), and categories can
  include multiple posts.
- [ ] Users should be able to filter posts in the main feed by category.

### Comments:

- [ ] Users should be able to comment on posts.
- [ ] Only registered users can add or delete their own comments.
- [ ] Comments must display the author’s name and the date/time they were posted.

### User Profile:

- [ ] Each user should have a profile page where their own posts are displayed.
- [ ] A profile page should only show posts created by the profile owner, ordered by the most
  recent.
- [ ] Visitors to the profile should be able to see the author’s posts along with the assigned
  categories.

### Main Feed:

- [ ] The main feed should display posts from all users, including the post's title, content preview,
  author’s name, categories, and the number of comments.
- [ ] Users should be able to filter posts by category and see posts from all categories by default.

### Search Functionality:

- [ ] Users should be able to search posts by keywords found in the post's title or content.
- [ ] The search results should include posts that match the search term in their title or body
  content.

## Description

Social Publishing Platform using Laravel 10

## Install

> [!NOTE]
> Dont't forget migrations

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
