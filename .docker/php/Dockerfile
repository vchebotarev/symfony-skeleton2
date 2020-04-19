FROM php:7.3-fpm-alpine

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Extensions
RUN echo "Extensions install - start" \
    # Sockets
    && docker-php-ext-install sockets \
    # PDO Postgres
    && set -ex \
    && apk --no-cache add postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    #
    && echo "Extensions install - finish"
