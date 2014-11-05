<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MySql Exercises 5</title>
    </head>
    <body>
        <h1>MySql Exercises - Page 5</h1>
        <a href="index.php">Page 1</a> | <a href="page2.php">Page 2</a> | <a href="page3.php">Page 3</a> | <a href="page4.php">Page 4</a> | <a href="page5.php">Page 5</a> | <a href="page6.php">Page 6</a>
        <br/>
        <br/>
        <?php
        $db = null;
        require './dbInitAndQuery.php';
        initDB();
        $sql = 'DROP TABLE IF EXISTS todo;';
        query($sql);
        $sql = 'DROP TABLE IF EXISTS user;';
        query($sql);
        createTable();
        ?>

        <h2>Joins</h2>
        <h2>Inner Join</h2>
        <h3>Write a query to display the title from the todos written by the user with an id of 1 (use "INNER JOIN" and "ON").</h3>
        <?php
        $sql = 'SELECT title FROM todo t INNER JOIN user u
ON t.user_id = u.id and user_id = 1;';
        displayRowInfo($sql,8);
        ?>
        <h3>Write the same query without "INNER JOIN" and "ON".</h3>
        <?php
        $sql = 'SELECT title FROM todo t, user u
WHERE t.user_id = u.id and user_id = 1;';
        displayRowInfo($sql,8);
        ?>
        
        <h3>Write a query to display title of the todos from users whose last name begins with "Sm".</h3>
        <?php
        $sql = 'SELECT t.title FROM todo t INNER JOIN user u ON t.user_id = u.id and u.l_name LIKE \'Sm%\';';
        displayRowInfo($sql,8);
        ?>
        <h3>Write a query to display the last name of the users that have a todo pending.</h3>
        <?php
        $sql = 'SELECT l_name FROM user u INNER JOIN todo t
ON t.user_id = u.id and t.status = \'PENDING\';';
        displayRowInfo($sql,8);
        ?>
        <h3>Write a query to display the last name of the active users (users with an active status) that have a todo pending.</h3>
        <?php
        $sql = 'SELECT l_name FROM user u INNER JOIN todo t
ON t.user_id = u.id and t.status = \'PENDING\' and u.status=\'ACTIVE\';';
        displayRowInfo($sql,8);
        ?>
        
         <h2>Left Join</h2>
         <h3>Write a query to display the last name of a user and the title of the todo for all the todos of users, and will display the user details even if the user has no todos (use "LEFT JOIN").</h3>
        <?php
        $sql = 'SELECT u.l_name, t.title FROM user u LEFT JOIN todo t
ON t.user_id = u.id;';
        displayRowInfo($sql,10);
         ?>
         
         <h2>Right Join</h2>
         <h3>Display the same data as the above query produces, but do so using a right join (use "RIGHT JOIN").</h3>
        <?php
        $sql = 'SELECT u.l_name, t.title FROM todo t RIGHT JOIN user u
ON t.user_id = u.id;';
        displayRowInfo($sql,10);
         ?>
        <?php
        
        //close db
        $db = null;
        ?>
    </body>
</html>
