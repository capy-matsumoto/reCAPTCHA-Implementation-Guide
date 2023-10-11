# PHP 8.2 with Apache
FROM php:8.2-apache

RUN a2enmod rewrite

EXPOSE 80
