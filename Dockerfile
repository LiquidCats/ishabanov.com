# Use a lightweight base image
FROM node:latest AS builder

# Set the working directory
WORKDIR /app

# Copy your package files
COPY package.json vite.config.* tsconfig.* ./
COPY . .

RUN npm install --frozen-lockfile
RUN npm run build

# Serve using a minimal image (optional: use nginx or caddy, or keep in Bun)
# Here's an example using a static file server
FROM nginx:alpine AS final

# Copy build output to nginx web root
COPY --from=builder /app/dist /usr/share/nginx/html

RUN echo 'server {\n\
  listen 80;\n\
  server_name localhost;\n\
  root /usr/share/nginx/html;\n\
  index index.html;\n\
  location / {\n\
    try_files $uri $uri/ /index.html;\n\
  }\n\
  error_page 404 /index.html;\n\
}' > /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]