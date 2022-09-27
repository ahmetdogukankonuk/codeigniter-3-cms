$(document).ready(function(){
    
    $(".remove-btn").click(function(){

        var $data_url = $(this).data("url");
        
        swal({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03045e',
            cancelButtonColor: '#0077b6',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText : "Hayır"
        }).then(function (result) {
            if (result.value) {
                window.location.href = $data_url;
            }
        });
        
    })
    
})