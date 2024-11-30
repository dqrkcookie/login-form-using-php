<?php

require "config/connect.php";

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if (isset($_POST["submit"])) {
    $submitted_inputs = "insert into dodoco_users (name, username, password) values ('$name', '$username', '$password')";

    if ($name == "" || $username == "" || $password == "") {
        echo "<script> window.alert('Sagutan mo lahat ng nasa form man!'); </script>";
    } else {
        mysqli_query($connect, $submitted_inputs);
        sleep(1);
        header("Location: login.php?registrationsuccess");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dodoco</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        flex-direction: row-reverse;
        justify-content: space-between;
        overflow-x: hidden;
    }

    div form input {
        display: block;
        margin: 3px;
        padding: 7px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
        border: none;
        outline-color: #f24;
    }

    div form input[type="submit"] {
        width: 40%;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        transition: .1s ease-in;
    }

    div form input[type="submit"]:hover {
        background-color: #f24;
    }

    div {
        background-color: rgb(214, 90, 90);
        width: max-content;
        padding: 4rem;
        display: grid;
        place-items: start end;
        height: 100vh;
    }

    div form {
        margin-top: 80%;
    }

    div form h1 {
        color: whitesmoke;
        margin-bottom: 12px;
        font-size: 2.25rem;
    }

    span {
        margin: 20% auto auto auto;
        font-size: 4rem;
        color: gray;
    }

    a {
        position: absolute;
        left: 0;
        margin: 8px;
        text-decoration: none;
        color: whitesmoke;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <span>Welcome to Dodoco!</span>
    <a href="login.php" title="Go back to Log in.">Back</a>
    <div>
        <form action="register.php" method="POST">
            <h1>Register</h1>
            <input id="name" type="text" placeholder="Name.." name="name" />
            <input id="email" type="text" placeholder="Username.." name="username" />
            <input id="password" type="password" placeholder="Password.." name="password" />
            <input id="submit" type="submit" value="Submit" name="submit" />
        </form>
    </div>
</body>

</html>