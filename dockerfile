# Use an official PHP 8 image with Apache
FROM php:8-apache

# Set working directory to /app
WORKDIR /app

# Install dependencies for Laravel
RUN apt-get update && apt-get install -y libzip-dev zip
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer --version

# Copy the current directory contents into the container at /app
COPY . /app/

# Install any needed packages specified in composer.json
RUN composer install --prefer-dist --no-scripts

# Make port 80 available to the world outside this container
EXPOSE 80

# Define environment variable
ENV ENVIRONMENT dev

# Command to run the development server
CMD ["apache2-foreground"]