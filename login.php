<?php

require "config/connect.php";

if (!$connect) {
    echo "Database connection failed: " . mysqli_connect_error();
}

$mysql = "select * from dodoco_users order by id";

$result = mysqli_query($connect, $mysql);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$login_state = false;

foreach ($data as $credential) {
    if ($username === $credential["username"] && $password === $credential["password"]) {
        $login_state = true;
        break;
    }
}

if (isset($_POST["submit"])) {
    if ($login_state) {
        header("Location: web_pages/home.html");
        die();
    } else if (!$password || !$username) {
        echo "<script> window.alert('Enter mo username at password man.') </script>";
    } else {
        echo "<script> window.alert('Mali ata password mo man.') </script>";
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
        margin-bottom: 6px;
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
        text-decoration: none;
        color: whitesmoke;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <span>Welcome to Dodoco!</span>
    <div>
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <input id="email" type="text" placeholder="Username" name="username" />
            <input id="password" type="password" placeholder="Password" name="password" />
            <input id="submit" type="submit" value="Log in" name="submit" />
            <a href="register.php" title="Click to create an account.">Don't have an account?</a>
        </form>
    </div>
</body>

</html>