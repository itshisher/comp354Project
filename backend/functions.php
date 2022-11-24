<?php

function emptyInputSignup($username, $password, $passwordRepeat) {
    $result;
    if(empty($username)|| empty($password) || empty($passwordRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function pwdMatch($password, $passwordRepeat) {
    $result;
    if ($password != $passwordRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($connection, $username) {
    $result;
    $sql = "SELECT * FROM bookappdb.user WHERE username = ?;";
    // initialize a statement to use sql statements 
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: frontend/signup.php?error=stmtfailed");
        exit();
    }

    //pass the data from users
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    // returns true if get some data from the database
    if($row = mysqli_fetch_assoc($resultData)) {
        // this parameter will be used again in login form
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($connection, $username, $password) {
    $sql = "INSERT INTO bookappdb.user(username, password) VALUES (?, ?);";
    //initialize a statment using the connection to the database
    $stmt = mysqli_stmt_init($connection);
    //check if it's possible to give database the information above 
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../frontend/signup.php?error=stmtfailed");
        exit();
    }
    
    //then bind parameters to the database
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    // execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../frontend/signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $password) {
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $username, $password) {
    //function uidExists ask either if the user input their username or email
    // users can decide to login use thier username or email address
    $uidExists = uidExists($connection, $username);

    if($uidExists === false) {
        header("location: ../frontend/login.php?error=wronglogin");
        exit();
    }

    // UsersPwd is the attribute in the database
    //$pwdHashed = $uidExists["password"];
    $pwd = $uidExists["password"];

    // check if the password users input matches to the hashed password
    //$checkPwd = password_verify($password, $pws);

    if($pwd !== $password) {  
        //wrong password
        header("location: ../frontend/login.php?error=wronglogin");
        exit();
    }
    
    else if($pwd === $password) {
        //log in users into the website
        //start sessions to store data
        session_start();
        $_SESSION["username"] = $uidExists["username"];
        
        //successfully loged in, go to the main webpage
        header("location: ../frontend/index.php");
        exit();
    }
    
}


/**
 * Displays the result of a SQL query as an HTML table.
 *
 * This table can be stylized through the qryres-{table|tr|th|td} CSS classes.
 *
 * $result The result of the query, as returned by mysqli::query.
 * $headers A list of strings for the table headers (th) to be displayed.
 */
function display_qry_result($result, $headers) {
    if ($result->num_rows == 0) {
        echo '0 results';
        return;
    }

    // Display result table
    echo '<table class="qryres-table">';

    // Display table headers
    echo '<tr class="qryres-tr">';
    foreach ($headers as $th)
        echo '<th class="qryres-th">' . htmlspecialchars($th) . '</th>';
    echo '</tr>';

    // Display table body, the sql query result
    while ($row = $result->fetch_assoc()) {
        echo '<tr class="qryres-tr">';
        foreach ($row as $td)
            echo '<td class="qryres-td">' . htmlspecialchars($td) . '</td>';
        echo '</tr>';
        
    }
    
    echo '</table>';
}

// create a table with an extra column shows delete/edit users
function edit_del_user($result, $headers) {
    if ($result->num_rows == 0) {
        echo '0 results';
        return;
    }

    // Display result table
    echo '<table class="qryres-table">';

    // Display table headers
    echo '<tr class="qryres-tr">';
    foreach ($headers as $th)
        echo '<th class="qryres-th">' . htmlspecialchars($th) . '</th>';
    echo '</tr>';

    // Display table body, the sql query result
    while ($row = $result->fetch_assoc()) {
        $id = array_shift($row);
        echo '<tr class="qryres-tr">';
        foreach ($row as $td)
            echo '<td class="qryres-td">' . htmlspecialchars($td) . '</td>';
            echo '<td><a href="editUser.php?id=' . $id . '">Edit</a> &nbsp <a href="deleteUser.php?id=' . $id . '">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

// create a table with an extra column shows delete/edit organizations
function edit_del_org($result, $headers) {
    if ($result->num_rows == 0) {
        echo '0 results';
        return;
    }

    // Display result table
    echo '<table class="qryres-table">';

    // Display table headers
    echo '<tr class="qryres-tr">';
    foreach ($headers as $th)
        echo '<th class="qryres-th">' . htmlspecialchars($th) . '</th>';
    echo '</tr>';

    // Display table body, the sql query result
    while ($row = $result->fetch_assoc()) {
        $id = array_shift($row);
        echo '<tr class="qryres-tr">';
        foreach ($row as $td)
            echo '<td class="qryres-td">' . htmlspecialchars($td) . '</td>';
            echo '<td><a href="editOrg.php?id=' . $id . '">Edit</a> &nbsp <a href="deleteOrg.php?id=' . $id . '">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function edit_del_emp($result, $headers) {
    if ($result->num_rows == 0) {
        echo '0 results';
        return;
    }

    // Display result table
    echo '<table class="qryres-table">';

    // Display table headers
    echo '<tr class="qryres-tr">';
    foreach ($headers as $th)
        echo '<th class="qryres-th">' . htmlspecialchars($th) . '</th>';
    echo '</tr>';

    // Display table body, the sql query result
    while ($row = $result->fetch_assoc()) {
        $id = array_shift($row);
        echo '<tr class="qryres-tr">';
        foreach ($row as $td)
            echo '<td class="qryres-td">' . htmlspecialchars($td) . '</td>';
            echo '<td><a href="editEmployee.php?id=' . $id . '">Edit</a> &nbsp <a href="deleteEmployee.php?id=' . $id . '">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}


function sub_author($result, $headers) {
    if ($result->num_rows == 0) {
        echo '0 results';
        return;
    }

    // Display result table
    echo '<table class="qryres-table">';

    // Display table headers
    echo '<tr class="qryres-tr">';
    foreach ($headers as $th)
        echo '<th class="qryres-th">' . htmlspecialchars($th) . '</th>';
    echo '</tr>';

    // Display table body, the sql query result
    while ($row = $result->fetch_assoc()) {
        $id = array_shift($row);
        echo '<tr class="qryres-tr">';
        foreach ($row as $td)
            echo '<td class="qryres-td">' . htmlspecialchars($td) . '</td>';
            echo '<td><a href="subscribe.php?id=' . $id . '">Subscribe</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}