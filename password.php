<?php



$password_hash = password_hash('password', PASSWORD_BCRYPT);
var_dump(password_verify('password', $password_hash));
