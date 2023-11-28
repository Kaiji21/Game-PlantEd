<p  align="center"><a  href="#"  target="_blank"><img  src="/readmeimg.jpg"  width="400"  alt="Laravel Logo"></a></p>

# Time Master Game


## Description

The "Time Master" game is designed to help players improve their time management skills. In this game, players are faced with task management challenges and must make quick decisions to complete a set of tasks within a given time frame. The ultimate goal is to achieve success at each level by effectively managing the allocated time.

## Features

1. Tasks and Levels
   - Defined Tasks: The game offers a variety of clearly defined tasks, each with an estimated duration for completion.
   - Difficulty Levels: The game is divided into levels, with each level presenting a specific set of tasks to be completed within a given time frame.

2. Time Management
   - Quick Decision Making: Players must make quick decisions about task priorities and time allocation.
   - Interaction Mechanisms: Use of buttons or drag-and-drop features to facilitate task management.

3. Rewards and Penalties
   - Rewards: Players are rewarded with points or additional levels for effective time management.
   - Penalties: Penalties are applied if the player fails to complete tasks within the given time frame.

## Technologies Used

1. Back-end with Laravel
   - PHP Framework: Laravel will be used as the PHP framework for the back-end development.
   - REST API: Implementation of a RESTful API to handle interactions between the front-end and back-end.
   - Database: Use of a database (MySQL, PostgreSQL, etc.) to store information about levels, tasks, and player progress.

2. Front-end with Vue.js
   - JavaScript Framework: Vue.js will be used to develop a responsive user interface.
   - API Communication: Integration with the Laravel API to retrieve and send data.
   - User Interface: Designing an attractive interface using Vue.js components to display tasks, remaining time, and progress.
##  Installation Instructions

To install and run the "Time Master" game locally, follow these steps:


1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/time-master.git
 ### Laravel Configuration

To install Laravel, please follow these steps:

1.  Make sure you have  [Composer](https://getcomposer.org/)  installed on your system.

2.  Open your terminal or command prompt and navigate to the root directory of your project.

3.  Run the following command to install Laravel and its dependencies:
    ```bash
    `composer install`
4.  Once the installation is complete, copy the  `.env.example`  file and rename it to  `.env`. Update the necessary configuration values in the  `.env`  file, such as the database connection details.
5.  Generate an application key by running the following command:
	```bash
    `php artisan key:generate`
 6.  Run the database migrations to create the necessary tables:
	  ```bash
	    `php artisan migrate`
6. Start the development server by running the following command:
	  ```bash
	    `php artisan serve`
 You should now be able to access your Laravel application at  `http://localhost:8000`.
  ### Vue Configuration
  To install Vue.js with Vite, please follow these steps:

1.  Make sure you have  [Node.js](https://nodejs.org/)  installed on your system.

2.  Open your terminal or command prompt and navigate to the root directory of your project.

3.  Run the following command to initialize a new Vue.js project: 
	 ```bash
	`cd Game-vue-Front`
 4.  Install the project dependencies by running the following command:
	 ```bash
	 `npm install` 
5.  Start the development server by running the following command:
     ```bash
	 `npm run dev`
		
You should now be able to access your Vue.js application at  `http://localhost:3000`.

	
 
				
				

