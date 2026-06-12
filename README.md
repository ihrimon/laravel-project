# Laravel Blog API Documentation

## Base URL
```
http://127.0.0.1:8000/api
```

## Required Header (Add this to every request in Postman)
```
Accept: application/json
```

---

## Categories API

### 1. Get All Categories
```
GET /api/categories
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Web Development",
            "slug": "web-development",
            "posts_count": 3
        }
    ]
}
```

---

### 2. Get Single Category
```
GET /api/categories/{id}
```

**Example:**
```
GET /api/categories/1
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Web Development",
        "slug": "web-development",
        "posts_count": 3
    }
}
```

---

### 3. Create Category
```
POST /api/categories
```

**Body → raw → JSON:**
```json
{
    "name": "Artificial Intelligence"
}
```

**Response (201):**
```json
{
    "success": true,
    "message": "Category created successfully.",
    "data": {
        "id": 6,
        "name": "Artificial Intelligence",
        "slug": "artificial-intelligence"
    }
}
```

---

### 4. Update Category
```
PUT /api/categories/{id}
```

**Example:**
```
PUT /api/categories/1
```

**Body → raw → JSON:**
```json
{
    "name": "Web Development Updated"
}
```

**Response:**
```json
{
    "success": true,
    "message": "Category updated successfully.",
    "data": {
        "id": 1,
        "name": "Web Development Updated",
        "slug": "web-development-updated"
    }
}
```

---

### 5. Delete Category
```
DELETE /api/categories/{id}
```

**Example:**
```
DELETE /api/categories/1
```

**Response:**
```json
{
    "success": true,
    "message": "Category deleted successfully."
}
```

**Error (category has existing posts):**
```json
{
    "success": false,
    "message": "Cannot delete category with existing posts."
}
```

---

## Posts API

### 1. Get All Posts
```
GET /api/posts
```

**Optional Query Parameters:**

| Parameter | Type   | Example               | Description                        |
|-----------|--------|-----------------------|------------------------------------|
| search    | string | `?search=laravel`     | Filter posts by title              |
| category  | string | `?category=database`  | Filter posts by category slug      |
| status    | string | `?status=published`   | Filter by draft or published       |
| per_page  | int    | `?per_page=5`         | Number of results per page         |

**Example:**
```
GET /api/posts?search=laravel&status=published&per_page=5
```

**Response:**
```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "title": "Complete Guide to Building a Laravel CRUD Application",
                "slug": "laravel-crud-complete-guide",
                "excerpt": "Learn step by step how to build...",
                "status": "published",
                "created_at": "2024-01-01T00:00:00.000000Z",
                "category": {
                    "id": 1,
                    "name": "Web Development",
                    "slug": "web-development"
                }
            }
        ],
        "total": 10,
        "per_page": 5,
        "last_page": 2
    }
}
```

---

### 2. Get Single Post
```
GET /api/posts/{id}
```

**Example:**
```
GET /api/posts/1
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "category_id": 1,
        "title": "Complete Guide to Building a Laravel CRUD Application",
        "slug": "laravel-crud-complete-guide",
        "excerpt": "Learn step by step how to build a fully functional CRUD application.",
        "body": "Laravel is the most popular PHP framework...",
        "image": null,
        "status": "published",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z",
        "category": {
            "id": 1,
            "name": "Web Development",
            "slug": "web-development"
        }
    }
}
```

---

### 3. Create Post
```
POST /api/posts
```

**Body → form-data:**

| Key         | Type | Required | Description                        |
|-------------|------|----------|------------------------------------|
| title       | text | Yes      | Title of the post                  |
| category_id | text | Yes      | ID of the category                 |
| excerpt     | text | No       | Short description (max 500 chars)  |
| body        | text | Yes      | Full content of the post           |
| image       | file | No       | Accepted: jpg, jpeg, png, webp     |
| status      | text | Yes      | Value: draft or published          |

**Example Values:**
```
title       = My First API Post
category_id = 1
excerpt     = This is a short description of the post.
body        = This is the full body content of the post.
status      = published
```

**Response (201):**
```json
{
    "success": true,
    "message": "Post created successfully.",
    "data": {
        "id": 11,
        "title": "My First API Post",
        "slug": "my-first-api-post",
        "status": "published",
        "category": {
            "id": 1,
            "name": "Web Development"
        }
    }
}
```

---

### 4. Update Post
```
PUT /api/posts/{id}
```

**Example:**
```
PUT /api/posts/1
```

> **Note:** When using form-data in Postman for a PUT request,
> send it as a POST request and add `_method = PUT` in the form-data body.

**Body → form-data:**

| Key         | Type | Required | Description                     |
|-------------|------|----------|---------------------------------|
| _method     | text | Yes      | PUT                             |
| title       | text | Yes      | Updated title                   |
| category_id | text | Yes      | Category ID                     |
| excerpt     | text | No       | Updated short description       |
| body        | text | Yes      | Updated full content            |
| image       | file | No       | New image to replace existing   |
| status      | text | Yes      | draft or published              |

**Response:**
```json
{
    "success": true,
    "message": "Post updated successfully.",
    "data": {
        "id": 1,
        "title": "Updated Post Title",
        "slug": "updated-post-title",
        "status": "published"
    }
}
```

---

### 5. Delete Post
```
DELETE /api/posts/{id}
```

**Example:**
```
DELETE /api/posts/1
```

**Response:**
```json
{
    "success": true,
    "message": "Post deleted successfully."
}
```

---

## Validation Error Response

When a required field is missing or invalid:

```json
{
    "message": "The title field is required.",
    "errors": {
        "title": [
            "The title field is required."
        ],
        "body": [
            "The body field is required."
        ],
        "category_id": [
            "The selected category id is invalid."
        ]
    }
}
```

---

## HTTP Status Codes

| Code | Meaning                                  |
|------|------------------------------------------|
| 200  | OK — Request was successful              |
| 201  | Created — New resource was created       |
| 404  | Not Found — Resource does not exist      |
| 422  | Unprocessable — Validation failed        |
| 500  | Internal Server Error                    |

---

## All Endpoints Summary

| Method | Endpoint             | Description                      |
|--------|----------------------|----------------------------------|
| GET    | /api/categories      | Get all categories               |
| GET    | /api/categories/{id} | Get a single category            |
| POST   | /api/categories      | Create a new category            |
| PUT    | /api/categories/{id} | Update an existing category      |
| DELETE | /api/categories/{id} | Delete a category                |
| GET    | /api/posts           | Get all posts (with filters)     |
| GET    | /api/posts/{id}      | Get a single post                |
| POST   | /api/posts           | Create a new post                |
| PUT    | /api/posts/{id}      | Update an existing post          |
| DELETE | /api/posts/{id}      | Delete a post                    |