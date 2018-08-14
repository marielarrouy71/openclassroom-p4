<?php

require_once('controller/FrontendController.php');
require_once('controller/BackendController.php');

$frontendController = new FrontendController();
$backendController = new BackendController();


if (!isset($_GET['action']) || $_GET['action'] === 'home') {
    $frontendController->home();
    return;
}

if ($_GET['action'] === 'detailNote') {
    $frontendController->detailNote($_GET['noteId']);

    return;
}

if ($_GET['action'] === 'addComment') {
    $frontendController->addComment($_POST["title"], $_POST["content"], $_POST["author"], $_GET['noteId']);
    return;
}

if ($_GET['action'] === 'notifyComment') {
    $frontendController->notifyComment($_GET['commentId'], $_GET['noteId']);
    return;
}


if ($_GET['action'] === 'adminHome') {

    $backendController->adminHome();
    return;
}

if ($_GET['action'] === 'updateNoteDisplay') {

    $backendController->updateNoteDisplay($_GET["noteId"]);
    return;
}

if ($_GET['action'] === 'updateNote') {

    $backendController->updateNote($_POST["title"], $_POST["content"], $_GET["noteId"]);
    return;
}

if ($_GET['action'] === 'deleteNote') {

    $backendController->deleteNote($_GET["noteId"]);
    return;
}

if ($_GET['action'] === 'manageCommentsDisplay') {


    $backendController->manageCommentsDisplay($_GET["noteId"]);
    return;

}

if ($_GET['action'] === 'keepComment') {

    $backendController->keepComment($_GET["commentId"], $_GET['noteId']);
    return;
}

if ($_GET['action'] === 'removeComment') {

    $backendController->removeComment($_GET["commentId"], $_GET['noteId']);
    return;
}
if ($_GET['action'] === 'addNoteDisplay') {

    $backendController->addNoteDisplay();
    return;
}

if ($_GET['action'] === 'addNote') {

    $backendController->addNote($_POST["title"], $_POST["content"]);
    return;
}

if ($_GET['action'] === 'loginDisplay') {
    $frontendController->loginDisplay();
    return;
}

if ($_GET['action'] === 'login') {
    $frontendController->login($_POST['pseudo'], $_POST['password']);
    return;
}
