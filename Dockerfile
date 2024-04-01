# Use dunglas/frankenphp as the base image
FROM dunglas/frankenphp

RUN install-php-extensions zip pdo_mysql gd intl opcache

# Copy the application code to the container
COPY . /app/public
