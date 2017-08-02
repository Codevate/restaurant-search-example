FROM mhart/alpine-node:6

RUN apk add --update git

RUN addgroup -S node && adduser -S -g node node
RUN chown -R node /usr/bin /usr/lib/node_modules
USER node

RUN npm install -g bower

WORKDIR /var/www/symfony
