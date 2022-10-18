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

        <!-- Data Table JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        
        <!-- Custom JS -->
        <script src="<?php echo base_url("assets"); ?>/js/custom.js"></script>
        <script src="<?php echo base_url("assets"); ?>/js/main.js"></script>
        <script src="<?php echo base_url("assets"); ?>/js/darkMode.js"></script>

        <!-- Alert & Notification JS -->
        <script src="<?php echo base_url("assets"); ?>/js/iziToast.min.js"></script>
        <script src="<?php echo base_url("assets"); ?>/js/sweetalert2.all.js"></script>
        
        <!-- Custom Alert JS -->
        <?php $this->load->view("includes/alert"); ?>
    </body>
</html>