
![Logo](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/th5xamgrr6se0x5ro4g6.png)


# Portfolio Website - API

This repository was created to store the backend api code of the dynamic personal portfolio website


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Tech Stack

**Frontend:** ReactJS, TailwindCSS, axios, react-router-dom

**Backend CMS:** Laravel, Bootstrap

**Backend API:** Laravel

**Database:** Mysql


## Features

- database migration
- RESTful API
- API Routing and Distribution



## Run Locally

Clone the project

```bash
  git clone https://github.com/syrsdev/portofolio-api
```

Go to the project directory

```bash
  cd portofolio-api
```

Install dependencies

```bash
  composer install
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
  php artisan serve
```

### Install and run the Website

please check and read the documentation: https://github.com/syrsdev/portofolio-web

### Install and run the CMS (Content Management System)

please check and read the documentation: https://github.com/syrsdev/portofolio-cms


## Authors

- [@syrsdev](https://www.github.com/syrsdev)


## Feedback

If you have any feedback, please reach out to us at https://linktr.ee/syrsdev

