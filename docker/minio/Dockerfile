FROM minio/minio:latest

RUN mkdir -p /tmp/.minio/certs
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /tmp/.minio/certs/private.key -out /tmp/.minio/certs/public.crt

