# GPCA Laravel Assessment Project

This is a Laravel project for managing **Events, Speakers, and Sessions**, including a RESTful API and a simple Blade UI.

---

## Table of Contents

-   [Setup](#setup)
-   [Database Migration](#database-migration)
-   [Running the Project](#running-the-project)
-   [Blade UI](#blade-ui)
-   [API Endpoints](#api-endpoints)
-   [License](#license)

---

## Setup

1. Clone the repository:

```bash

git clone https://github.com/TorresAngelo18/gpca.git
cd gpca/gpcas-assessment

```

2. Install PHP dependencies:

```bash

composer install

```

3. Copy the environment file and configure your database:

```bash

cp .env.example .env

```

Edit .env and set the correct database credentials.

4. Generate the application key:

```bash

php artisan key:generate

```

## database-migration

```bash

php artisan migrate
php artisan db:seed

```

## Running the Project

Start the development server:

```bash

php artisan serve

```

Access the project in your browser:

```bash

http://127.0.0.1:8000

```

## Blade UI

\*The Blade-based UI includes:

Home / Events List
---List all events
---Add, Edit, or Delete events

Event Details Page
---Displays all speakers and sessions under the event
---Add new speakers or sessions
---Assign speakers to sessions via checkboxes

Speaker Pages
---View speaker details and sessions assigned

Session Pages
---View session details and assigned speakers

## API Endpoints

All API routes are prefixed with /api. Responses are JSON with a success boolean, message, and data.

Events

| Method | URL              | Description        |
| ------ | ---------------- | ------------------ |
| GET    | /api/events      | List all events    |
| POST   | /api/events      | Create a new event |
| GET    | /api/events/{id} | Get event details  |
| PUT    | /api/events/{id} | Update an event    |
| DELETE | /api/events/{id} | Delete an event    |

Speakers

| Method | URL                | Description          |
| ------ | ------------------ | -------------------- |
| GET    | /api/speakers      | List all speakers    |
| POST   | /api/speakers      | Create a new speaker |
| GET    | /api/speakers/{id} | Get speaker details  |
| PUT    | /api/speakers/{id} | Update a speaker     |
| DELETE | /api/speakers/{id} | Delete a speaker     |

Sessions

| Method | URL                | Description          |
| ------ | ------------------ | -------------------- |
| GET    | /api/sessions      | List all sessions    |
| POST   | /api/sessions      | Create a new session |
| GET    | /api/sessions/{id} | Get session details  |
| PUT    | /api/sessions/{id} | Update a session     |
| DELETE | /api/sessions/{id} | Delete a session     |

## License

This project is open-source and free to use.
