FROM nginx:alpine

# Remove default config
RUN rm -rf /etc/nginx/conf.d/default.conf
# Copy app config
COPY ./docker/production/server/config /etc/nginx/conf.d

# Copy existing application directory contents
COPY . /app

WORKDIR /app

RUN chmod -R 775 .
