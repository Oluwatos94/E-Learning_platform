# Online Learing Platform #

## Overview ##
Myschool Tutors is an innovative online learning platform designed to modernize the learning experience through digital enhancements. This prototype web application empowers tutors to deliver educational content, including lesson videos, files, and reading materials, fostering a dynamic and interactive learning environment for students.

__Note that this web app is developed for educational purposes and is not a complete, production-ready application.__

## Table of content
* [Features](Features)
* [Requirements](Requiremdents)
* [Installation Process](Installation%20Process)
* [Getting Started](Getting%20Started)

 ## Features ##
 
 __User Registration and Authentication__
 
 * All users can create a profile account.
 * Users must be fully authenticated to have access to all the features that come with this web application.

__Course Creation and Management__

* Users who are either instructors or Admin can create and manage courses. (i.e. They can perform all the CRUD functionalities).

__Enrollment, Learning path and Progress tracking__
* Students can enroll in courses
* Track thier learning path as they complete lesson materials.
* Efficiently manage learning path.

## Requirements ##
* [PHP 8.1/ 8.2](https://www.php.net/docs.php)
* [Symfony](https://symfony.com/)
* [Docker](https://www.docker.com/)

## Installation Process ##
__Installation for XAMPP Setup__

### Guild lines to successfully install setup ###
1. Clone this repository on your local machine: `git clone https://github.com/Oluwatos94/E-Learning_platform.git`

2. Use `composer update` to install and update all necessary dependencies.

3. Create a .env.local file and copy the contents of .env into it.

4. Create the database by running: symfony console doctrine:database:create

5. Run the migration to update your database schema: symfony console doctrine:migrations:migrate

6. Make sure your XAMPP Apache server is up and running.

7. Start the local web server: symfony server:start -d

8. Open the project in your web broswer by clicking on the local server url from your terminal.

### Guild lines to successfully set up with docker machine. ###

1. `If you prefer to use Docker for running the project, follow these steps:

     In your `.env.local` file, make the following changes:
   - Comment out the XAMPP database URL.
   - Uncomment the Docker database URL configuration.

2. Run the following command to update Composer dependencies (if you've not done it before):

   `bash
   composer update`
   
3. Install npm for assets compilation (if you've not done it before):

    `npm install`

4. Compile assets using webpack (if you've not done it before):
    `npm run dev`

5. Ensure you have Docker Desktop installed and are logged in.

6. Build the Docker image and start the containers using the following command:
    `docker-compose up --build`

7. Once the containers are built and running, open another terminal and navigate to the project directory.

8. Get a bash shell inside the MariaDB container:
    `docker exec -it <mariadb-container-id> bash`

9. Inside the bash shell, log in to the MariaDB server:
    `mariadb -u root -p`

10. Enter "root" as the password when prompted to log in.

11. Exit the bash shell and get a bash shell inside the FPM (PHP) container:
    `docker exec -it <fpm-container-id> bash`

12. Access the project using the following URL:
    http://localhost:1001/

## Getting Started ##

#### Now you are set to explore the e-learning platform. You can register, login or create profile and or create courses if you are logged in as an instructor. ####

