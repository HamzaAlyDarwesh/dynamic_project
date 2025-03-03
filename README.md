## 1- Setup Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7 or higher

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/your-repo.git
   
- Navigate to the project directory: cd project-directory
- composer install
- cp .env.example .env
- php artisan migrate --seed
- php artisan serve

## 2- Example Requests/Responses

### Register a User
**Request:**
```bash
    POST /api/register
    Content-Type: application/json
    
    {
        "first_name": "John",
        "last_name": "Doe",
        "email": "john.doe@astudio.com",
        "password": "password123"
    }
```
**Response**
```bash
{
    "message": "Resource created successfully",
    "success": true,
    "data": {
        "first_name": "John",
        "last_name": "Doe",
        "email": "john.doe@astudio.com",
        "id": 2
    },
    "errors": null
}
```

### Create Project
**Request:**
```bash
    GET /api/projects
    Content-Type: application/json
    
    {
    filters[name]:Second
    filters[name_operator]:LIKE
    filters[department]:IT
    }
```
**Response:**

```bash
{
    "data": [
        {
            "id": 7,
            "name": "Second Project",
            "status": "active",
            "attributes": [
                {
                    "id": 9,
                    "attribute": "department",
                    "type": "text",
                    "value": "IT"
                }
            ]
        },
        {
            "id": 8,
            "name": "Second Project",
            "status": "active",
            "attributes": [
                {
                    "id": 10,
                    "attribute": "department",
                    "type": "text",
                    "value": "IT"
                }
            ]
        },
        {
            "id": 9,
            "name": "Second Project",
            "status": "active",
            "attributes": [
                {
                    "id": 11,
                    "attribute": "department",
                    "type": "text",
                    "value": "IT"
                }
            ]
        },
        {
            "id": 10,
            "name": "Second Project",
            "status": "active",
            "attributes": [
                {
                    "id": 12,
                    "attribute": "department",
                    "type": "text",
                    "value": "IT"
                }
            ]
        },
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/projects?page=1",
        "last": "http://127.0.0.1:8000/api/projects?page=2",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/projects?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/projects?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/projects?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/projects?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/projects",
        "per_page": 15,
        "to": 15,
        "total": 16
    }
}
```
## 3- Test Credentials

- user:
john.doe@astudio.com
- pass:
gt^uoE4$

## note:
You can find dump database on main directory with name:
dump-dynamic_project-202503031042.sql


