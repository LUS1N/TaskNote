<?php

ini_set("display_errors", true);
error_reporting(E_ALL);

require("functions.php");
require("constants.php");

session_start();

// require authentication for all pages except /login.php, /logout.php, and /register.php
if (!inPaths(["/login.php","/register.php"]))
{
    if (empty($_SESSION["id"]))
    {
        redirect("login.php");
    }
    else
    {
        if(inPaths(["index.php"]))
        {
            redirect("account.php");
        }
    }
}

function inPaths($paths)
{
    foreach ($paths as $path)
    {
        if(strpos( $_SERVER["PHP_SELF"], $path))
        return true;
    }
    return false;
}