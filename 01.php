<?php
$cookie_name = "visit_count";
if(isset($_COOKIE[$cookie_name])) {
    $visit_count = $_COOKIE[$cookie_name] + 1;
} else {
    $visit_count = 1;
}
setcookie($cookie_name, $visit_count, time() + (30 * 24 * 60 * 60));
echo "You have visited this page " . $visit_count . " times.";
?>

