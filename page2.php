<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 2</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 2</h1>
        <a href="index.php">Page 1</a> | <a href="page2.php">Page 2</a> | <a href="page3.php">Page 3</a> | <a href="page4.php">Page 4</a> | <a href="page5.php">Page 5</a> | <a href="page6.php">Page 6</a>
        <br/>
        <br/>
        <?php
        $db = null;
        require './dbInitAndQuery.php';
        initDB();
        $sql = 'DROP TABLE IF EXISTS employee;';
        query($sql);
        ?>

        <!--        Create-->
        
        <h3>Write an SQL statement to create a table employee including columns employeeId, firstName, lastName, email, phoneNumber, salary, managerId and departmentId.</h3>
        <?php
        $sql = 'CREATE TABLE IF NOT EXISTS employee ( 
employeeId int AUTO_INCREMENT PRIMARY KEY,
firstName varchar(20) DEFAULT NULL, 
lastName varchar(25) NOT NULL, 
email varchar(25) NOT NULL, 
phoneNumber varchar(20) DEFAULT NULL, 
salary decimal DEFAULT NULL, 
managerId int DEFAULT NULL, 
departmentId int NOT NULL 
);';
        query($sql);
        ?>
        
        <!--        End Create-->

        <!--        Insert-->

        <h3>Write an SQL statement to insert a row into the employee table (make sure the employee's first name is "Bob").</h3>
        <?php
        $sql = 'INSERT INTO employee VALUES(null,\'Bob\',\'Jones\',\'myemail\',\'21131001\',2300000,123,435);';
        query($sql);
        echo $sql;
        ?>

        <h3>Write an SQL statement to insert a row into the employee table with different values (make sure the employee's first name is "Mary" and her department id is 888).</h3>
        <?php
        $sql = 'INSERT INTO employee VALUES(null,\'Mary\',\'Smith\',\'marysemail\',\'5131002\',2303000,127,888);';
        query($sql);
        echo $sql;
        ?>

        <!--        End Insert-->
        
        <h2>Update</h2>

        <h3>Write an SQL statement to change the email column of employee table to 'not available' for all employees.</h3>
        <?php
        $sql = 'UPDATE employee SET email=\'not available\';';
        query($sql);
        ?>

        <h3>Write an SQL statement to change the phoneNumber and salary column of employees table to '555 5555' and 78000.00 for those employees whose departmentId is 435.</h3>
        <?php
        $sql = 'UPDATE employee 
        SET phoneNumber=\'555 5555\',
        salary=78000.00 
        WHERE departmentId=435;';
        query($sql);
        ?>

        <h3>Write an SQL statement to change the departmentId of employee table to 456 for those employees whose first name is "Bob" and salary is over $50,000.</h3>
        <?php
        $sql = 'UPDATE employee 
SET departmentId=456 
WHERE firstName=\'Bob\' AND salary > 50000.00;';
        query($sql);
        ?>

        <h2>Like</h2>

        <h3>Write an SQL statement to change managerId of an employee to 111 if the employee belongs to department 888 and first name begins with "Ma".</h3>
        <?php
        $sql = 'UPDATE employee 
SET managerId=111 
WHERE firstName LIKE \'Ma%\' AND departmentId = 888;';
        query($sql);
        ?>

        <h2>NOT/Like</h2>

        <h3>Write an SQL statement to change lastName of an employee to "Potter" if the employee's first name contains "ar".</h3>
        <?php
        $sql = 'UPDATE employee
SET lastName=\'Potter\'
WHERE NOT firstName LIKE \'%ar%\';';
        query($sql);
        ?>

        <?php
        
        //close db
        $db = null;
        ?>
    </body>
</html>
