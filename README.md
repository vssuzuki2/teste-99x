# 99x API Project

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-24.0-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Redis](https://img.shields.io/badge/Redis-7.0-DC382D?style=for-the-badge&logo=redis&logoColor=white)

A containerized Laravel API application served via Nginx, with MySQL, Redis

## 🚀 Getting Started

Follow these instructions to get the project up and running on your local machine.

### Prerequisites

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

### 🛠 Installation

1.  **Clone the repository**
    ```bash
    git clone git@github.com:vssuzuki2/teste-99x.git
    cd teste-99x
    ```

2.  **Start Containers**
    Build and start the Docker containers in the background.
    ```bash
    docker-compose up -d
    ```

3.  **Laravel Commands inside php Container**
    Install PHP dependencies using Composer inside the container.
    ```bash
    docker exec -it php82
    php artisan serve --host=0.0.0.0
    php artisan migrate
    ```

## 🧪 Running Tests

To run the application's test suite:

```bash
docker-compose exec php82 php artisan test
```

## 📂 Project Structure

```bash
.
├── .docker/                # Docker configuration files (Dockerfile, supervisord)
├── docker/                 # Service data and configurations PERSISTANCE (MySQL)
├── nginx/                  # Nginx proxy configuration
├── www/                    # Application source code
│   └── 99x-api/            # Laravel API project
└── docker-compose.yaml     # Main container orchestration file
```

---
*Created with Victor for the 99x "live codeing" TEST.*
