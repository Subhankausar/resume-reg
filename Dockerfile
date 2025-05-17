# Use the official PHP 8.2 CLI image
FROM php:8.2-cli

# Set the working directory inside the container
WORKDIR /app

# Copy all files from your repo into the container
COPY . .

# Install PDO and MySQL extensions for PHP
RUN docker-php-ext-install pdo pdo_mysql

# Expose the port that Render expects your app to run on
EXPOSE 10000

# Start PHP's built-in development server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
