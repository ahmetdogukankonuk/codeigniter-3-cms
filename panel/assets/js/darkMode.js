const darkMode = document.getElementById("darkMode")

if (localStorage.getItem('dark-theme')===null){
    localStorage.setItem('dark-theme', "false");
}

checkStatus()

function checkStatus(){
    if (localStorage.getItem('dark-theme')==="true"){
        darkMode.checked = true;                            
        document.body.classList.toggle("dark-theme");
    }else{
        darkMode.checked = false;
    }
}

function changeStatus(){                               
    if (localStorage.getItem('dark-theme')==="true"){               
        localStorage.setItem('dark-theme', "false");
        document.body.classList.remove("dark-theme");
    } else{
        localStorage.setItem('dark-theme', "true");
        document.body.classList.toggle("dark-theme");
    }
}