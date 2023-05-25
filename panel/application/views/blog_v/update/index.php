<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("includes/head"); ?>
        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    </head>
    <body id="body-pd">
        <?php $this->load->view("includes/header"); ?>

        <?php $this->load->view("includes/sidebar"); ?>

        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

        <?php $this->load->view("includes/footer"); ?>
        
        <script>
            ClassicEditor
                .create( document.querySelector( '#text_tr' ) )
                .catch( error => {
                    console.error( error );
                } );

                ClassicEditor
                .create( document.querySelector( '#text' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        
        <?php $this->load->view("includes/include_script"); ?>
    </body>
</html>