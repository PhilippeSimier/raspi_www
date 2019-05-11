<?php
// make the HTTP request to the requested URL
$content = file_get_contents("http://api.open-notify.org/iss-now.json");

echo $content;