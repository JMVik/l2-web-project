<?php

session_start();

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

switch ($_SESSION['lang']) {
    case 'fr':
        include(dirname(__FILE__) . "/../locales/fr.php");
        break;
    case 'en':
        include(dirname(__FILE__) . "/../locales/en.php");
        break;
    case 'de':
        include(dirname(__FILE__) . "/../locales/de.php");
    break;
    default:
        include(dirname(__FILE__) . "/../locales/fr.php");
        break;
}

if (isset($_GET['lang'])) {
    switch ($_GET['lang']) {
        case 'fr':
            $_SESSION['lang'] = 'fr';
            include(dirname(__FILE__) . "/../locales/fr.php");
            break;
        case 'en':
            $_SESSION['lang'] = 'en';
            include(dirname(__FILE__) . "/../locales/en.php");
            break;
        case 'de':
            $_SESSION['lang'] = 'de';
            include(dirname(__FILE__) . "/../locales/de.php");
            break;
        default:
            $_SESSION['lang'] = 'fr';
            include(dirname(__FILE__) . "/../locales/fr.php");
            break;
    }
}

?>