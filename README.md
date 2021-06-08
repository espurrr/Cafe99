# Cafe99

Cafe99 is a Web-based Order Management System customized for a 'non-existent' Lounge.  
This web app was made using raw PHP as backend, built upon MVC architecture. MySQL to satisfy database needs. And raw HTML,CSS,JS for front-end.  
This project was focused on learning purposes, more specifically.. to build a fully functioncal web application WITHOUT using ANY FRAMEWORKS!  
Actors in the system are as follows :  
  - Customer
  - Kitchen Manager
  - Cashier
  - Delivery Person
  - Restaurant Manager

## Installation

First, you will need to install  [XAMPP](https://www.apachefriends.org/index.html). following the instructions on their site.  
Then, simply clone the git repo and proceed with the configuration.

## Configuration

Create a new database with the name **cafe99** via phpmyadmin.  
Then import the SQL file in `assets/test-database/cafe99.sql` into your newly created database.  
After that, define your database connection parameters in `application/config/config.php`, keep it as is, if it does not need to be editted.  
  
If you want to test our app, starting by creating a user, the next thing you will need is an email address to run the business.  
Under "Email Parameters" define your email connection parameters in `application/config/config.php`
Or else..  
Since, you already have our testing-db, you can test a particular actor by using the credentials in "For Testing Purposes" Section.  

As we have implemented necessary functions to carry out payments using [Payhere sandbox](https://sandbox.payhere.lk/), you can make a sandbox account and put the Merchant ID in  `application/views/customer/cust-payment.php`. Edit the value parameter in line 49.  
```
 <input type="hidden" name="merchant_id" value="">    <!-- Replace your Merchant ID -->
```

Now you can test the app! Just boot up your XAMPP Apache and MYSQL services and visit [this URL](http://localhost/cafe99/account_controller/)  
Enjoy our luscious app! :drooling_face:

## For Testing Purposes, Use

1. Customer
  - email : buddhini@gmail.com
  - password : 12345678
2. Kitchen Manager
  - email : yeshan@gmail.com
  - password : 12345
3. Cashier
  - email : chenuka@gmail.com
  - password : 12345
4. Delivery Person
  - email : udani@gmail.com
  - password : 12345
5. Restaurant Manager
  - email : imesha@gmail.com
  - password : 12345


