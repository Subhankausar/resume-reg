FROM php:8.2-cli

# Install system dependencies required for PHP extensions
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /app

# Copy all files into the container
COPY . .

# Expose the port Render expects
EXPOSE 10000

# Start PHP's built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
