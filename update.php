<?php 
$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";
$b = shell_exec('git pull');
echo "<pre>$b</pre>";
?>