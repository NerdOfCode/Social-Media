# Social-Media
An open source Social Media platform that is designed to be lightweight and efficient while being secure.

# Documentation (w.i.p)
Please change the values in `creds.php` to match your needs and wants...
You can follow the steps below to continue setting up the Gate Networks Site to support posts, and users.

***This setup has been tested on MariaDB Version: 10.1.26-MariaDB on Debian ***


To create the database please run the following using MariaDB
```mysql
CREATE DATABASE gate_networks;
```
After creating the database you can use it by running:
```mysql
USE gate_networks;
```
After switching over to it, we can now create the table that stores user information...
We can create this by running:
```mysql
CREATE TABLE users(id int NOT NULL AUTO_INCREMENT, name VARCHAR(256) NOT NULL, password VARCHAR(1024) NOT NULL, IP VARCHAR(124), primary key (id));
```
Now after creatings the `user` table we can now create the comments table...
We can accomplish such by running:
```mysql
CREATE TABLE comments(id int NOT NULL AUTO_INCREMENT, header VARCHAR(256) NOT NULL, comments VARCHAR(1024) NOT NULL, date VARCHAR(124) NOT NULL, name VARCHAR(256) NOT NULL, primary key(id));
```
Finally, after finishing setting up the databases, we can now finish up the site's installment...
Simply change the values in `creds.php` according to the commands we just ran. 
If you followed the above guide exactly, your `creds.php` file should look like the below except for the values used to access MariaDB: 
```php
<?php
  //Change the values below to access your MySQL database
  $username = 'whatever_the_MariaDB_username is';
  $password = 'Same thing';
  $host = 'localhost';
  $database = 'gate_networks';
  $table = 'users';
  
  //The below values are for more flexibility towards post tracking
  //Change the values according to your needs
  //Ex: $database2 = 'comments';
  
  $database2 = 'gate_networks';
  $table2 = 'comments';
  //Configure the below to satisfy the PHP mail function
  $from = '';
  $reply = '';
  //Allowed amount of accounts from one IP
  $allowed = '2';
  
  
?>

```

Make sure to finish the $from, $reply, and $allowed fields to allow email verification to be successful.

# Note
I did not create parsedown.php...
