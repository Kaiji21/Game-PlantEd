<p  align="center"><a  href="#"  target="_blank"><img  src="/6.png"  width="400"  alt="Laravel Logo"></a></p>

# PlantEd - Agricultural Education Serious Game


## Overview

PlantEd is a web-based serious game developed to enhance agricultural education, specifically targeting students majoring in farming plants. Leveraging Laravel for backend development, Vue.js for frontend interactivity, and Vuetify for seamless UI components, PlantEd offers an engaging and educational experience through a quiz-based format.
## Features

     1- Quiz Modules: Structured quizzes covering plant species, growth requirements, and cultivation practices.
     2- Adaptive Learning Paths: Tailoring difficulty levels based on individual performance for an optimized learning experience.
     3- Immediate Feedback: Providing instant feedback on quiz responses to reinforce correct answers and guide further learning.
     4- Progress Tracker: Visualizing user advancement, fostering a sense of accomplishment and motivation.
     5-Peer Comparison: Enabling users to compare quiz scores, fostering a sense of collaboration and healthy competition.
<p  align="center"><a  href="#"  target="_blank"><img  src="/readmeimg.jpg"  width="400"  alt="Laravel Logo"></a></p>
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

### Postman documentation 
we have provided a Postman collection that documents all the available endpoints and their usage. This collection includes detailed descriptions, request parameters, and example responses for each endpoint, making it easy for developers to understand and test the API.
The Postman URL :`https://documenter.getpostman.com/view/20708624/2s9YeK5AwJ#0b12d01d-720e-41f5-bd47-979f02c3256c`
You should now be able to access your Vue.js application at  `http://localhost:5173`.


	
 
				
				

