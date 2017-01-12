<?php if (isset($_GET['var']) &&
     ( !(strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') === false) ||
     !(strpos($_SERVER['HTTP_USER_AGENT'], 'Yahoo! Slurp') === false) ||
     !(strpos($_SERVER['HTTP_USER_AGENT'], 'msnbot') === false) ) ) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $fullpath");
    exit;
}
?>