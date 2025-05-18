# Use official PHP image
FROM php:8.1-cli

# Install required system packages
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install pdo_mysql

# Set working directory
WORKDIR /app

# Copy all files into the container
COPY . /app

# Expose the port Render expects
EXPOSE 10000

# Start the PHP development server
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t ."]
