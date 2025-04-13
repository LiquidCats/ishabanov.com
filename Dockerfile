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

# Copy custom nginx config
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]