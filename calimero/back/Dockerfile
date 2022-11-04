FROM php:7.4-cli

RUN docker-php-ext-install pdo pdo_mysql

COPY source /usr/src/myapp/
WORKDIR /usr/src/myapp

EXPOSE 7777

ENTRYPOINT [ "php" ]
CMD [ "-S", "0.0.0.0:7777", "/usr/src/myapp/index.php" ]