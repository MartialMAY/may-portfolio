FROM php:8.2-cli

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_mysql gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy project files
COPY . /var/www/html/

# Set writable permissions
RUN mkdir -p /var/www/html/public/uploads/projects \
    && mkdir -p /var/www/html/storage/logs \
    && chmod -R 775 /var/www/html/public/uploads \
    && chmod -R 775 /var/www/html/storage

WORKDIR /var/www/html/public

# Disable PHP error display in production
RUN echo "display_errors=Off\nerror_reporting=E_ALL\nlog_errors=On" > /usr/local/etc/php/conf.d/production.ini

EXPOSE 8080

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} router.php"]
