
![Logo](https://github.com/syrsdev/portofolio-web/blob/main/public/assets/nataniel-purple.svg)


# Portfolio Website - CMS (Content Management System)

This repository was created to store the CMS code of the dynamic personal portfolio website


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Tech Stack

**Frontend:** ReactJS, TailwindCSS, axios, react-router-dom

**Backend CMS:** PHP, Laravel, Bootstrap

**Backend API:** PHP, Laravel

**Database:** Mysql


## Features

- database migration
- Content Manaement System
- Dinamic Data
- CRUD personal data



## Run Locally

Clone the project

```bash
  git clone https://github.com/syrsdev/portofolio-cms
```

Go to the project directory

```bash
  cd portofolio-cms
```

Install dependencies

```bash
  composer install

  npm install
```

Environment

```bash
  cp .env.example .env 

  Search & Replace db name in .env file
  DB_DATABASE=portofolio
```

Database & App setup

```bash
  php artisan migrate
  or with seeder
  php artisan migrate:fresh --seed

  php artisan key:generate
```

Start the server

```bash
  php artisan serve --port=8081

  open another terminal and run:
  npm run dev
```

### Install and run the Website

please check and read the documentation: https://github.com/syrsdev/portofolio-web

### Install and run the API

please check and read the documentation: https://github.com/syrsdev/portofolio-api


## Authors

- [@syrsdev](https://www.github.com/syrsdev)


## Feedback

If you have any feedback, please reach out to us at https://linktr.ee/syrsdev

