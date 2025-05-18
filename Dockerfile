# Use official PHP image
FROM php:8.1-cli

# Set working directory
WORKDIR /app

# Copy all files into the container
COPY . /app

# Expose the port Render expects (Render uses 10000 by default)
EXPOSE 10000

# Start PHP server on correct interface and port
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
