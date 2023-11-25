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
    <?php wp_head(); ?>
</head>
<!-- body class functions insert classes to the body -->
<body <?php body_class("my-custom-class-inside-body-tag"); ?>>
    <!-- function to insert functions after the body tag open -->
<?php
if( function_exists( 'wp_body_open' )) {
    wp_body_open();
} 
?>    

    <div class="site" id="page">

        <header id="mastheader" class="site-header" role="banner">   
            <?php get_template_part( 'templates/header/navbar' ); ?>
        </header>

        <div id="content" class="site-content">
