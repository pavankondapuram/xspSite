<?php

$admins = "CREATE TABLE admins
          (
		   id int(13) NOT NULL AUTO_INCREMENT,
		   username VARCHAR(65),
		   password VARCHAR(65),
		   date DATE,
		   name VARCHAR(30),
		   email VARCHAR(30),
		   auth_keys VARCHAR(40),
		   priority VARCHAR(10),
		   type VARCHAR(13),
		   PRIMARY KEY(id)
		   )";

$contactUs = "CREATE TABLE contact_us
	          (
		       id int(13) NOT NULL AUTO_INCREMENT,
		       date DATE,
			   name varchar(30),
		   	   email varchar(30),
			   contact_no varchar(13),
			   message longtext,
			   status varchar(100) NOT NULL,
			   priority varchar(10),
			   ip varchar(100),
			   PRIMARY KEY(id)
			  )";
			  
$sentmailContactUs = "CREATE TABLE sentmail_contact_us
             (
              id int(13) NOT NULL AUTO_INCREMENT,
              date DATE,
              name varchar(30),
              email varchar(30),
              subject varchar(100),
              message longtext,
              PRIMARY KEY(id)
             )";
			 


?>