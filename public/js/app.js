

function changeDashboard (option) {

    document.querySelector('.dashboard').style.display = "none";
    document.querySelector('.account').style.display = "none";
    document.querySelector('.travels').style.display = "none";
    document.querySelector('.cars').style.display = "none";
    



    switch(option) {
        case 1: 
            document.querySelector('.dashboard').style.display = "block";
            
            break;
        case 2: 
            document.querySelector('.account').style.display = "block"
            break;
        case 3:
            document.querySelector('.travels').style.display = "block"
            break;
        case 4:
            document.querySelector('.cars').style.display = "block"
            break;
    }

}
