<?php
// setup the autoloading
require_once '/../vendor/autoload.php';

// // setup Propel
require_once '/../generated-conf/config.php';


/*
* CS50
*/
function logout()
{
    // unset any session variables
    $_SESSION = [];
    
    // expire cookie
    if (!empty($_COOKIE[session_name()]))
    {
        setcookie(session_name(), "", time() - 42000);
    }
    
    // destroy session
    session_destroy();
}

function validateRegistration()
{
    // validate submission
    if (empty($_POST["username"]))
    {
        apologize("You must provide your username.");
    }
    else if (empty($_POST["password"]))
    {
        apologize("You must provide your password.");
    }
    else if ($_POST["password"] !== $_POST["confirmation"])
    {
        apologize("Your must passwords must match.");
    }
    
    $user = UserQuery::create()->findByName($_POST["username"]);
    if($user->count())
    {
        apologize("Username taken");
    }
    
    
}

/**
* CS50
*/
function apologize($message)
{
    render("apology.php", ["message" => $message, "title"=> ""]);
    exit;
}


/*
* From CS50
*/
function redirect($destination)
{
    // handle URL
    if (preg_match("/^https?:\/\//", $destination))
    {
        header("Location: " . $destination);
    } // handle absolute path
    else if (preg_match("/^\//", $destination))
    {
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host = $_SERVER["HTTP_HOST"];
        header("Location: $protocol://$host$destination");
    } // handle relative path
    else
    {
        // adapted from http://www.php.net/header
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host = $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: $protocol://$host$path/$destination");
    }
    
    // exit immediately since we're redirecting anyway
    exit;
}


/**
* From CS50
*/
function render($template, $values = [])
{
    // if template exists, render it
    if (file_exists("templates/$template"))
    {
        // extract variables into local scope
        extract($values);
        
        // render header
        require("templates/components/header.php");
        
        // render template
        require("templates/$template");
        
        // render footer
        require("templates/components/footer.php");
        
    } // else err
    else
    {
        trigger_error("Invalid template: $template", E_USER_ERROR);
    }
}