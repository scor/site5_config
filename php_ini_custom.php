<?php
// Put all the php.ini parameters you want to change below. One per line.
// Follow the example format $parm[] = "parameter = value";
$parm[] = "register_globals = Off";
$parm[] = "memory_limit = 64M";
$parm[] = "post_max_size = 16M";
$parm[] = "upload_max_filesize = 32M";

// full unix path - location of the default php.ini file at your host
// you can determine the location of the default file using phpinfo()
$defaultPath = "/usr/lib/php.ini"; 
// full unix path - location where you want your custom php.ini file
$customPath = "/home/USER/php.ini";

// nothing should change below this line.
if (file_exists($defaultPath)) {
  $contents = file_get_contents($defaultPath); 
  $contents .= "\n\n; USER MODIFIED PARAMETERS FOLLOW\n\n";  
  foreach ($parm as $value) $contents .= $value . " \n";
  if (file_put_contents($customPath,$contents)) {
    if (chmod($customPath,0600)) $message = "The php.ini file has been modified and copied";
      else $message = "Processing error - php.ini chmod failed";
  } else {
    $message = "Processing error - php.ini write failed";
  }
} else {
  $message = "Processing error - php.ini file not found";
}
echo $message;
?> 
