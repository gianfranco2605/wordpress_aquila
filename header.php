<?php
/**
 * Header Template
 * 
 * @package Aquila
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<!-- body class functions insert classes to the body -->
<body <?php body_class("my-custom-class-inside-body-tag"); ?>>
    <!-- function to insert functions after the body tag open -->
<?php wp_body_open() ?>    
    <header>Header</header>