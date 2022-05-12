<?php

class userActions
{

    public $link;

    public function __construct($dbhost = 'localhost', $dbuser = 'relatebeheer', $dbpass = 'Z1HaCog5gh6d%efu', $dbname = 'relatebeheer', $charset = 'utf8') {
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($this->connection->connect_error) {
            $this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
        }
        $this->connection->set_charset($charset);
        return $this->link;
    }

    function registerUsersP($first_name, $last_name_prefix, $last_name, $street, $housenumber, $housenumberAddition, $postalcode, $phoneNumber, $email, $customer_of){
        $query = $this->link->prepare("INSERT INTO `customers_individual`(`first_name`,`last_name_prefix`, `last_name`, `street`,
                                   `housenumber`, `housenumberAddition`,
                                   `postalcode`, `phoneNumber`,email,customer_of) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $query->bind_param("sssssssssi", $first_name, $last_name_prefix, $last_name, $street, $housenumber, $housenumberAddition, $postalcode, $phoneNumber, $email, $customer_of);
        $query->execute();
    }
    function registerUsersZ($first_name, $last_name_prefix, $last_name, $street, $housenumber, $housenumberAddition, $postalcode, $phoneNumber, $email, $business, $customer_of){
        $query = $this->link->prepare("INSERT INTO `customers_business`(`first_name`,`last_name_prefix`,`last_name`,`street`,
                                 `housenumber`,`housenumberAddition`,`postalcode`,`phoneNumber`,
                                 `email`,`business`,`customer_of`)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $query->bind_param("ssssssssssi", $first_name, $last_name_prefix, $last_name, $street, $housenumber, $housenumberAddition, $postalcode, $phoneNumber, $email, $business, $customer_of);
        $query->execute();
    }
}


