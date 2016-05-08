<?php
require("includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // else render form
    render("login_form.php", ["title" => "Log In"]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
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
    
    $user = UserQuery::create()->findOneByName($_POST["username"]);
    if($user == null)
    {
        apologize("Wrong user name or password.");
    }
    
    if(crypt($_POST["password"], $user->getPassword()) == $user->getPassword())
    {
        $_SESSION["id"] = $user->getId();
        redirect("account.php");
    }
    else {
        apologize("Wrong user name or password.");
    }
    
}