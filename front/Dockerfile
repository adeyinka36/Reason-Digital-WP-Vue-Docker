FROM node:lts-alpine

WORKDIR /App

COPY front/package.json ./

RUN npm install

COPY front/. .

RUN npm run build

EXPOSE 8081

CMD ["npm", "run", "serve"]