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

        <script>
            const ctx = document.getElementById('myChart');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    datasets: [{
                        label: 'Sales of this week',
                        data: [56, 34, 41, 22, 97, 75, 84],
                        backgroundColor: [
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                        ],
                        borderColor: [
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                            '#90e0ef',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        
        <?php $this->load->view("includes/include_script"); ?>
    </body>
</html>