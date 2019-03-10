<?php
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $name = $_POST['file'];
    $fname = $name . ".txt";
    $data = str_replace(array("<", ">"), array("&lt;", "&gt;"), $data);

    $file = fopen("files/" . $fname, 'w');
    fwrite($file, $data);
    fclose($file);
}
?>