<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("includes/head"); ?>
    </head>
    <body id="body-pd">
        <?php $this->load->view("includes/header"); ?>

        <?php $this->load->view("includes/sidebar"); ?>

        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

        <?php $this->load->view("includes/footer"); ?>
        
        <?php $this->load->view("includes/include_script"); ?>
    </body>
</html>