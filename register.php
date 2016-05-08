<?php

require("includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    render("register_form.php", ["title" => "Register"]);
}
else
{
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        validateRegistration();
    }
    
    // if registration passed withouth problems, create a new user
    // hash the password
    $hash = @crypt($_POST["password"]);
    $user = new User();
    $user->setName($_POST["username"]);
    $user->setPassword($hash);
    $user->save();
    
    // remember that user's now logged in by storing user's ID in session
    $_SESSION["id"] = $user->getId();
    
    // redirect to account page
    redirect("account.php");
}
