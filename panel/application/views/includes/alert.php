<?php

    $alert = $this->session->userdata("alert");

    if($alert){

        if($alert["type"] === "success"){ ?>

            <script>
                iziToast.success({
                    backgroundColor: '#ffff',
                    titleColor: '#03045e',
                    iconColor: '#03045e',
                    messageColor: '#023e8a',
                    progressBarColor: '#03045e',
                    color: '#03045e',
                    title: '<?php echo $alert["title"]; ?>',
                    message: '<?php echo $alert["text"]; ?>',
                    position : "topRight"
                })
            </script>

        <?php } else { ?>

            <script>
                iziToast.error({
                    backgroundColor: '#ffff',
                    titleColor: '#03045e',
                    iconColor: '#03045e',
                    messageColor: '#023e8a',
                    progressBarColor: '#03045e',
                    color: '#03045e',
                    title: '<?php echo $alert["title"]; ?>',
                    message: '<?php echo $alert["text"]; ?>',
                    position : "topRight"
                })
            </script>

        <?php }
    } 
?>