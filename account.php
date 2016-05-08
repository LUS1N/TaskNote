<?php

require("includes/config.php");

$user = UserQuery::create()->findPK($_SESSION["id"]);
$query = NoteQuery::create()->orderById('desc');
$notes = $user->getNotes($query);

$mustache = new Mustache_Engine(array(
   'loader' => new Mustache_Loader_FilesystemLoader('templates/partials')
));

$tpl = $mustache->loadTemplate('note_row');

render("account_view.php",["title"=>"Account", "notes"=> $notes, "tpl" => $tpl]);

