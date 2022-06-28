<?php
    $token = md5(sha1(rand(999,999).mt_rand(999,999999)));
    $_SESSION['_token'] = $token;
