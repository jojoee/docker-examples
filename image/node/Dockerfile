FROM node:argon

ENV NODE_ENV=production

RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app
RUN npm install -g nodemon yarn pm2 http-server

EXPOSE 8006

CMD ["node", "default.js"]

VOLUME ["/usr/src/app"]
