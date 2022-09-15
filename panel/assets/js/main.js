const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{

            nav.classList.toggle('show')

            toggle.classList.toggle('bi-x')

            bodypd.classList.toggle('body-pd')
            
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','navbar','body-pd','header')

const linkColor = document.querySelectorAll('.nav-link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))


// Data Table Function
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );


// Jquery Sortable Table
$( function() {
    $( "#sortable" ).sortable();
} );