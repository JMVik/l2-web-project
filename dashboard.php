<?php

session_start();

if (isset($_SESSION['email'])) {
    echo '<h1> Welcome ' . $_SESSION['email'] . '</h1>';
} else {
    echo '<h1> Welcome Guest </h1>';
}