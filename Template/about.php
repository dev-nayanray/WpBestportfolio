<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'loop/aboutinfo' ); ?>

<?php get_template_part( 'loop/business' ); ?>
<?php get_template_part( 'loop/blog' ); ?>
<?php get_template_part( 'loop/pricing' ); ?>
<?php get_template_part( 'Template/teamabout'); ?>
<?php get_template_part( 'loop/contactfrom' ); ?>

<?php get_footer(); ?>