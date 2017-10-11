<?php
if (! isset($_SESSION)) {
    session_start();
}

include ("api/api_index.php");

$email = $_REQUEST["logInEmail"] ?? "";
$token = $_SESSION["user"] ?? "";
if (empty($token) && ! empty($token)) {
    $_SESSION["user"] = Request($token);
    $_SESSION["login"] = true;
    header("Location: index.php");
}

function Request($request)
{
    $data = trim($request);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>