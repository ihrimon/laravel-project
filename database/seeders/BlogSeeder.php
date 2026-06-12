<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Categories
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Database',        'slug' => 'database'],
            ['name' => 'DevOps',          'slug' => 'devops'],
            ['name' => 'Software Design', 'slug' => 'software-design'],
            ['name' => 'Programming',     'slug' => 'programming'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Posts
        $posts = [
            [
                'category_id' => 1,
                'title'       => 'Complete Guide to Building a Laravel CRUD Application',
                'slug'        => 'laravel-crud-complete-guide',
                'excerpt'     => 'Learn step by step how to build a fully functional CRUD application using Laravel with best practices.',
                'body'        => 'Laravel is the most popular PHP framework used by developers worldwide. In this tutorial, we will learn how to create Model, Migration, Controller, and View from scratch.

When creating a Model, you should always use the fillable property. This protects your application from mass assignment vulnerabilities and keeps your code secure.

Using a Resource Controller gives you six methods out of the box: index, create, store, edit, update, and destroy. This follows RESTful conventions and keeps your code organized.

The Blade templating engine makes it easy to build clean and dynamic UIs. Directives like @foreach, @if, and @extends help you write readable and reusable templates.

Always validate incoming requests using Laravel Form Request classes to keep your controllers clean and your data safe.',
                'status'      => 'published',
            ],
            [
                'category_id' => 1,
                'title'       => 'RESTful API Design Best Practices Every Developer Should Know',
                'slug'        => 'restful-api-design-best-practices',
                'excerpt'     => 'Building a good RESTful API requires following a set of principles. This post covers the most important ones.',
                'body'        => 'RESTful API design is a critical skill for modern web developers. Using HTTP methods correctly is the foundation of a well-designed API.

GET is used to retrieve data without side effects. POST is used to create new resources. PUT or PATCH is used for updating existing resources. DELETE is used to remove resources.

Always return the correct HTTP status codes in your responses. Use 200 OK for success, 201 Created when a resource is created, 404 Not Found when a resource does not exist, and 422 Unprocessable Entity for validation errors.

API versioning is essential to avoid breaking changes for existing clients. A common approach is to prefix routes with the version number, such as /api/v1/posts.

Use consistent naming conventions for your endpoints. Always use nouns instead of verbs, for example /posts instead of /getPosts.',
                'status'      => 'published',
            ],
            [
                'category_id' => 2,
                'title'       => 'How MySQL Indexes Improve Query Performance',
                'slug'        => 'mysql-index-query-performance',
                'excerpt'     => 'If your database queries are running slow, adding the right indexes can dramatically improve performance.',
                'body'        => 'A database index is a data structure that speeds up the retrieval of rows from a table. Without indexes, MySQL performs a full table scan for every query.

On large tables, a full table scan is extremely slow and resource-intensive. Adding an index on frequently queried columns can reduce query time from seconds to milliseconds.

Primary keys are automatically indexed in MySQL. However, you should manually create indexes on columns that are frequently used in WHERE clauses, JOIN conditions, or ORDER BY statements.

CREATE INDEX idx_title ON posts(title);

Be careful not to over-index your tables. Every index slows down INSERT and UPDATE operations because the index must be updated along with the data. Only add indexes where they provide a measurable performance benefit.',
                'status'      => 'published',
            ],
            [
                'category_id' => 2,
                'title'       => 'Database Normalization Explained: From 1NF to 3NF',
                'slug'        => 'database-normalization-1nf-to-3nf',
                'excerpt'     => 'Understanding database normalization helps you reduce redundancy and maintain data integrity in your applications.',
                'body'        => 'Database normalization is the process of organizing a relational database to reduce data redundancy and improve data integrity.

First Normal Form (1NF) requires that every column contains atomic values and that there are no repeating groups within a row. Each column should hold a single piece of information.

Second Normal Form (2NF) builds on 1NF by requiring that every non-key attribute is fully dependent on the entire primary key. This eliminates partial dependencies.

Third Normal Form (3NF) builds on 2NF by requiring that there are no transitive dependencies. Every non-key attribute should depend only on the primary key.

Normalizing your database reduces update anomalies, insertion anomalies, and deletion anomalies, making your data consistent and easier to maintain.',
                'status'      => 'published',
            ],
            [
                'category_id' => 3,
                'title'       => 'Deploying a Laravel Application with Docker',
                'slug'        => 'docker-laravel-deployment',
                'excerpt'     => 'Docker containers make it easy to deploy your Laravel application consistently across any server or environment.',
                'body'        => 'Docker is a containerization platform that allows you to run applications in isolated environments called containers.

A Dockerfile defines all the dependencies your application needs to run. A docker-compose.yml file lets you manage multiple services together, such as your application, web server, and database.

For a typical Laravel application, you need three services: PHP-FPM to process PHP code, Nginx as the web server, and MySQL as the database.

Docker eliminates the classic "works on my machine" problem. Your development and production environments are identical, which means fewer surprises during deployment.

Using Docker volumes, you can persist database data even when containers are stopped or restarted.',
                'status'      => 'published',
            ],
            [
                'category_id' => 3,
                'title'       => 'Building a CI/CD Pipeline with GitHub Actions',
                'slug'        => 'cicd-pipeline-github-actions',
                'excerpt'     => 'GitHub Actions makes it straightforward to automate your testing and deployment pipeline for any project.',
                'body'        => 'CI/CD stands for Continuous Integration and Continuous Deployment. It automates the process of testing and delivering software changes.

GitHub Actions workflows are defined in YAML files stored in the .github/workflows/ directory of your repository. Each workflow is triggered by events such as a push or a pull request.

Every time you push code, your test suite runs automatically. If all tests pass, the code can be deployed to your server without any manual steps.

For a Laravel project, a typical workflow includes running PHPUnit tests, checking code style with Laravel Pint, and deploying to a server via SSH.

A good CI/CD pipeline gives your team confidence to ship code frequently and catch bugs before they reach production.',
                'status'      => 'published',
            ],
            [
                'category_id' => 4,
                'title'       => 'SOLID Principles Explained with Simple Examples',
                'slug'        => 'solid-principles-explained',
                'excerpt'     => 'Writing code that follows SOLID principles makes it easier to maintain, extend, and test over time.',
                'body'        => 'SOLID is an acronym for five object-oriented design principles that help developers write better software.

S stands for Single Responsibility Principle. A class should have only one reason to change. If a class handles both user authentication and email sending, it has two responsibilities and should be split.

O stands for Open/Closed Principle. A class should be open for extension but closed for modification. You should be able to add new behavior without changing existing code.

L stands for Liskov Substitution Principle. A subclass should be replaceable by its parent class without breaking the application.

I stands for Interface Segregation Principle. It is better to have many small, specific interfaces than one large general-purpose interface.

D stands for Dependency Inversion Principle. High-level modules should not depend on low-level modules. Both should depend on abstractions.',
                'status'      => 'published',
            ],
            [
                'category_id' => 4,
                'title'       => 'Understanding the Repository Pattern in Laravel',
                'slug'        => 'repository-pattern-laravel',
                'excerpt'     => 'The Repository Pattern separates your business logic from data access logic, making your application easier to test and maintain.',
                'body'        => 'The Repository Pattern is a design pattern that abstracts the data access layer from the rest of the application.

Instead of calling Eloquent models directly inside controllers, you interact with a repository interface. This makes it easy to swap out the data source without touching your business logic.

To implement this pattern in Laravel, start by creating an interface that defines the methods your repository must implement. Then create a class that implements that interface using Eloquent.

Register the binding in a Service Provider so that Laravel knows which implementation to inject when the interface is requested.

This pattern makes unit testing much easier because you can swap the real repository with a mock or in-memory implementation during tests.',
                'status'      => 'published',
            ],
            [
                'category_id' => 5,
                'title'       => 'Git Branching Strategy: GitFlow vs Trunk Based Development',
                'slug'        => 'git-branching-strategy',
                'excerpt'     => 'Choosing the right Git branching strategy is crucial when working in a team to avoid merge conflicts and deployment issues.',
                'body'        => 'A Git branching strategy defines the rules for how your team creates, merges, and manages branches in a repository.

GitFlow uses five types of branches: main, develop, feature, release, and hotfix. It works well for large teams with scheduled release cycles and multiple versions in production.

Trunk Based Development keeps things simple. Everyone commits to a single main branch with short-lived feature branches. It encourages frequent integration and works well with CI/CD pipelines.

For small to medium teams that deploy frequently, Trunk Based Development is generally the better choice. It reduces long-lived branches and minimizes painful merge conflicts.

Regardless of the strategy you choose, always write clear commit messages and open pull requests for code review before merging.',
                'status'      => 'published',
            ],
            [
                'category_id' => 5,
                'title'       => '10 Habits That Will Help You Write Clean Code',
                'slug'        => 'clean-code-10-habits',
                'excerpt'     => 'Writing clean code is a skill built through daily practice. These 10 habits are the perfect starting point for any developer.',
                'body'        => 'Clean code is code that is easy to read, understand, and maintain. It communicates its intent clearly without needing excessive comments.

1. Use meaningful names. Instead of $d, write $daysSinceCreation. Names should reveal intent.

2. Keep functions small. A function should do one thing and do it well. If it is doing more than one thing, split it.

3. Write fewer comments. Good code should be self-documenting. A comment that explains what the code does is a sign that the code needs to be clearer.

4. Follow the DRY principle. Do not Repeat Yourself. If you are writing the same logic twice, extract it into a reusable function or class.

5. Avoid magic numbers. Instead of 86400, define a constant called SECONDS_PER_DAY.

6. Handle errors properly. Never silently swallow exceptions. Always handle errors in a meaningful way.

7. Write tests. Untested code is legacy code. Tests give you confidence to refactor and add features.

8. Be consistent with formatting. Use a linter or code style tool like Laravel Pint to enforce consistent style across the codebase.

9. Reduce dependencies. The fewer dependencies a class has, the easier it is to test and reuse.

10. Refactor without fear. Clean code is not written in one pass. Revisit and improve your code regularly.',
                'status'      => 'published',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}