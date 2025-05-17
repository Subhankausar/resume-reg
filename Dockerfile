FROM php:8.2-cli

WORKDIR /app
COPY . .

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Expose the port Render expects
EXPOSE 10000

# Start PHP's built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
