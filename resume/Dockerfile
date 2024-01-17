# Use an official PHP runtime as a parent image
FROM php:8-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Expose port 3000
EXPOSE 3000

# Run the command
CMD ["apache2-foreground"]