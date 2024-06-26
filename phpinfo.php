<?php
    session_start();
?>
<form enctype="multipart/form-data" method="post" action="image.php">
     Select File:<?php var_dump($_SESSION); ?>
     <input name="uploaded_file" type="file"/><br/>
     <input type="submit" value="Upload"/>
 </form>
<?php
    phpinfo();
    dasdas
?>
