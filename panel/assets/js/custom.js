$(document).ready(function () {

    $(".sortable").sortable();

    $(".remove-btn").click(function(){

        var $data_url = $(this).data("url");
        
        swal({
            title: 'Are you sure?',
            text: "You will not be able to undo this action!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03045e',
            cancelButtonColor: '#0077b6',
            confirmButtonText: 'Yes, Delete!',
            cancelButtonText : "No"
        }).then(function (result) {
            if (result.value) {
                window.location.href = $data_url;
            }
        });
        
    })


    $(".situationSetter").change(function(){
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
            
            $.post($data_url, { data : $data}, function (response) {

            });

        }
    })


    $(".image_list_container").on('change', '.isCover', function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {
                
                $(".image_list_container").html(response);

            });

        }

    })


    $(".sortable").on("sortupdate", function(event, ui){
        
        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function(response){})

    })

    var uploadSection = Dropzone.forElement("#dropzone");

    uploadSection.on("complete", function(file){

        var $data_url = $("#dropzone").data("url");

        $.post($data_url, {}, function(response){

            $(".image_list_container").html(response);

        });

    })

})