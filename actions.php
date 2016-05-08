<?php

require("includes/config.php");

$action = isset($_POST["action"]) ? $_POST["action"] : null;

if($action == null)
{
    exit;
}

if($action === "submit")
{
    createNote();
}

if ($action == "delete") {
    deleteNote($_POST["id"]);
}

if ($action == "edit") {
    editNote($_POST["id"]);
}

function editNote($id)
{
    $note = NoteQuery::create()->findPK($id);
    $note->setTitle($_POST["title"]);
    $note->setContent($_POST["content"]);
    
    echoJson($note);
}

function deleteNote($id)
{
    NoteQuery::create()->findPK($id)->delete();
    echo true;
}

function createNote()
{
    $user = UserQuery::create()->findPK($_SESSION["id"]);
    $note = new Note();
    $note->setTitle($_POST["title"]);
    $note->setContent($_POST["content"]);
    $user->addNote($note);
    $user->save();
    
    echoJson($note);
}

function echoJson($note)
{
    echo json_encode(extractValues($note));
}

function extractValues($note)
{
    return [
    "title"=>$note->getTitle(),
    "content"=>$note->getContent(),
    "id"=> $note->getId()];
}