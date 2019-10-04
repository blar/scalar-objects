FROM alpine:3.10 as build
WORKDIR /tmp
RUN apk add --no-cache git g++ make php7-dev
RUN git clone https://github.com/nikic/scalar_objects.git
RUN cd scalar_objects && phpize && ./configure && make

FROM alpine:3.10
RUN apk add --no-cache php7 php7-phar php7-dom php7-mbstring
COPY --from=build /tmp/scalar_objects/modules/scalar_objects.so /usr/lib/php7/modules/scalar_objects.so
RUN echo extension=scalar_objects.so > /etc/php7/conf.d/scalar_objects.ini
RUN wget -O /usr/local/bin/phpunit https://phar.phpunit.de/phpunit-8.phar
RUN chmod +x /usr/local/bin/phpunit
COPY . /mnt

WORKDIR /mnt
CMD ["phpunit", "--testdox"]
