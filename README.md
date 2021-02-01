# Vanilla Soft

Task:  
- Use the latest version of Laravel to send multiple emails asynchronously over API

Overview:   
- Build a simple API that supports the sending route
- Build a Mail object which accepts email, subject, body, attachments
- Make sure that emails are sent asynchronously, i.e. not blocking the send request
- Test the route


## Table of Contents

 * [Technologies](#technologies)
 * [Features](#features)
 * [API Endpoints](#api-endpoints)
 * [Getting Started](#getting-started)
    * [Installation](#installation)
    * [Testing](#testing)
    

### API Endpoints
<table>
	<tr>
		<th>HTTP</th>
		<th>ENDPOINT</th>
		<th>REQUEST PAYLOAD</th>
		<th>FUNCTIONALITY</th>
	</tr>
	<tr>
		<td>POST</td>
		<td>/api/send</td> 
		<td>{
    "emails": ["email@gmail.com", "email2@gmail.com"],
    "body": "I am a clever programmer.",
    "subject": "me",
    "attachments": [{
           "base64": "iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAARElEQVR42u3PMREAAAgEIE1u9DeDqwcN6EqmHmgRERERERERERERERERERERERERERERERERERERERERERERERERkYsFOoB8nTpF298AAAAASUVORK5CYII=",
           "filename": "test.png"
     },
     {
           "base64": "iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAARElEQVR42u3PMREAAAgEIE1u9DeDqwcN6EqmHmgRERERERERERERERERERERERERERERERERERERERERERERERERkYsFOoB8nTpF298AAAAASUVORK5CYII=",
           "filename": "sample.png"
     }
     ]
}</td> 
<td>Send Multiple Emails.</td>
	</tr>
	<tr>
		<td>GET</td>
		<td>/api/list</td> 
		<td>No request payload</td> 
		<td>Get all emails sent.</td>
	</tr>
	
</table>

## Technologies

* [Laravel](https://laravel.com/) - PHP web framework


## Features

* Send Mails
* List All Mails

## Getting Started

### Installation

* git clone
  [Vanilla Soft](https://github.com/holuwatobeey/VanillaSoft.git)
* Run `composer install` to install packages .
* Copy .env.example file, create a .env file if not created and edit database credentials there .
* Run `php artisan key:generate` to set application key to secure user sessions and other encrypted data .
* Change QUEUE_CONNECTION=sync to QUEUE_CONNECTION=database in .env .
* Create a database.
* Configure database settings in .env.
* Configure Mail information in .env .
* Run `php artisan queue:table` to create jobs table and save queue list .
* Run `php artisan migrate` to run database migrations .
* Run `php artisan serve` to start the server .
* Run `php artisan queue:listen` to listen and run new jobs as they are pushed onto the queue .
* Run `php artisan test` to run tests .


### Testing

#### Prerequisites

* [Postman](https://getpostman.com/) - API Toolchain
- Use the body tab and json raw setting to send requests easily.

#### Testing with Postman

* After installing as shown above
* Navigate to [localhost:8000](http://localhost:8000/) in
  [Postman](https://getpostman.com/) to access the application
