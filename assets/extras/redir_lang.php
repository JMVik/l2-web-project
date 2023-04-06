<?php

$langueNavigateur = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
parse_str($_SERVER['QUERY_STRING'], $params);
if (!isset($params['lang'])) {
    header('Location: ' . $_SERVER['QUERY_STRING'] . '?lang=' . $langueNavigateur);
    exit();
}