# Laravel Subscription Platform

This Laravel application serves as a subscription platform where users can subscribe to websites and receive notifications via email whenever a new post is published on those websites.

## Features

- RESTful API to manage subscriptions and posts.
- Automated email notifications to subscribers on new post publication.
- Utilizes Laravel Queues and Jobs for email delivery.
- Scheduled command to ensure all subscribers are notified.
- Docker-based setup for easy development and deployment.

## Prerequisites

Before you begin, ensure you have Docker and Docker Compose installed on your machine. This project uses Docker to simplify dependency management and environment setup.

## Setup Instructions

To get the project up and running on your local machine, follow these steps:

1. **Clone the Repository**

```bash
git clone https://github.com/anabeto93/inisev-subscription-test
cd inisev-subscription-test
```

2. **Build and Start Docker Containers**

Make sure to create a copy of env file. You can do this by running
```bash
cp .env.example .env
```
If you are using mailtrap like I did for this, make sure to provide the values for the env variables in the `.env` file
```bash
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=username_here
MAIL_PASSWORD=mailtrap_password_here
```
You can now run the below to complete the application setup

```bash
make setup
```

## Using the Application
### Access
The container is by default exposed on port `8024` over `https`

The base url is `https://localhost:8024`

### API Endpoints
Look through the attached postman collections for the API endpoints. They are briefly described below:

- #### Subscribe to a Website: `POST /api/v1/subscriptions`
    - Body: `{"user_id": 1, "website_id": 1}`

- #### Create a Post: `POST /api/v1/posts`
    - Body: `{"website_id": "1", "title": "New Post", "content": "Post content here."}`

### Commands
- ### Send Missed Post Notifications
    ```bash
    php artisan posts:send-missed-notifications
    ```
## Development Notes
- Laravel Horizon is used for queue management. Access the Horizon dashboard at [https://localhost:8024/horizon](https://localhost:8024/horizon) after starting the application.
- The application is configured to use a Docker environment. See `docker-compose.yml` for service definitions.

## Horizon Dashboard
In case the horizon dashboard is not running, you can manually start it this way
```bash
make horizon
php artisan horizon &
exit
```
