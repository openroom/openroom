# Openroom 

Openroom is a web application that manages your room reservations.

This version of openroom is a work-in-progress. 
We have a lot of enhancements planned. 
The project is free and open source (GPLv3). 

## Implemented changes 

Please help test "normal" mode (as opposed to ldap) of the application. 
Openroom now has preliminary support for `password_hash()` and `password_verify()`. 
This is a long overdue change and it is as important as fixing our SQL injection vulnerabilities. 
This means anyone who is using normal mode before today (hopefully not in production), 
should inform their users that we need to rehash their passwords. 
This is also a good time to ask the users to change their passwords. 
Please take it for a spin today and tell me if you face any bugs! 

## Proposed technologies 

* PHP 7.1 for a better PHP 
* PDO for database interaction 
* Twig for templating and better theme support  
* jQuery and bootstrap for front end 
* Rework the PHP objects. 

## Proposed supported web browsers 

* Support current versions of Google Chrome and Mozilla Firefox 

## A demo for twig support 
Please take a look at 

[this screen shot](https://i.imgur.com/gQxtCB5.png). 
![List of reservations](https://i.imgur.com/gQxtCB5.png) 

It is just an example to show you what I want you to be able to do with your own custom theme.
This form is not functional and likely will not be in 2018. 
This is only a demonstration of my vision. 

## Rework the PHP objects 

The PHP `\model` namespace is not fully implemented yet. 
One problem I noticed is I need to make a better use of object-oriented PHP. 
For instance, a reservation is for a particular room and a particular user. 
The reservation object is incomplete without a reference to the room object and the user object. 
When I give you an object of `\model\Reservation`, you should be able to have full access 
to the information about the room and the user without any further access to the database (and indeed not even care what database we use). 
On another hand, Openroom is flexible. 
This is the reason why administrator is a separate class and not a property of user. 
Under the current scheme, we need to be able to make a username an administrator without that user ever existing. 
This is also essential in case of LDAP authentication where we don't control user authentication.  

# Thoughts? 

Please feel free to open an issue or a pull request on github. 

Freebie commit April 30, 2019 
Freebie commit May 28, 2019
Freebie commit May 29, 2019 
Freebie commit July 24, 2019

create user openroomdemo@localhost identified by '53PVs7nj2i2AD5FXNLNpZyW3B3sG31WGPThmPCntdldKwxZ5vvb3Pg266HSN8NG';
drop database if exists openroom;
create database openroom;
grant all privileges on openroom.* to openroomdemo@localhost;

```bash
[root@ideapadflex-kushal ~]# mysql
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 9
Server version: 10.3.22-MariaDB MariaDB Server

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> create user openroomdemo@localhost identified by '53PVs7nj2i2AD5FXNLNpZyW3B3sG31WGPThmPCntdldKwxZ5vvb3Pg266HSN8NG';
Query OK, 0 rows affected (0.001 sec)

MariaDB [(none)]> drop database if exists openroom;
Query OK, 0 rows affected, 1 warning (0.000 sec)

MariaDB [(none)]> create database openroom;
Query OK, 1 row affected (0.000 sec)

MariaDB [(none)]> grant all privileges on openroom.* to openroomdemo@localhost;
Query OK, 0 rows affected (0.000 sec)

MariaDB [(none)]> \q
Bye
[root@ideapadflex-kushal ~]# 
```

```
[kushal@ideapadflex-kushal openroom]$ mysql -u openroomdemo -p
Enter password: 
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 56
Server version: 10.3.22-MariaDB MariaDB Server

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> use openroom;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [openroom]> source today.sql
Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.023 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.021 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 1 row affected (0.003 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 1 row affected (0.003 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 70 rows affected (0.008 sec)
Records: 70  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.003 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.024 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 1 row affected (0.003 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.024 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.023 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 28 rows affected (0.004 sec)
Records: 28  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.006 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 2 rows affected (0.003 sec)
Records: 2  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.007 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 42 rows affected (0.007 sec)
Records: 42  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.003 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.021 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 6 rows affected (0.004 sec)
Records: 6  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.010 sec)

Query OK, 0 rows affected (0.013 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.026 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.014 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.021 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 37 rows affected (0.007 sec)
Records: 37  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.003 sec)

Query OK, 0 rows affected (0.020 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.024 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 4 rows affected (0.003 sec)
Records: 4  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.006 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

MariaDB [openroom]> \q
Bye
[kushal@ideapadflex-kushal openroom]$ 
```
