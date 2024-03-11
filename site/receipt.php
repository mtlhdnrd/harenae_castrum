<?php
    session_start();

    $receipt_file = tmpfile();
    $meta_data = stream_get_meta_data($receipt_file);
    $filename = $meta_data["uri"];
    $receipt_text = $_SESSION["receipt_text"];
    fwrite($receipt_file, $receipt_text);
    unset($_SESSION["receipt_text"]);

    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.basename($filename));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($filename));
    header("Content-Type: text/plain");
    readfile($filename);
    fclose($receipt_file);
