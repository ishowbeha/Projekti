document.addEventListener("DOMContentLoaded", function(ngjarja) {
    const SubmitButon = document.getElementById('btn');
    

    const validate = (ngjarja) => {
        ngjarja.preventDefault();
        const emri = document.getElementById('emri');
        const mbiemri = document.getElementById('mbiemri');
        const password = document.getElementById('pass');
        const email = document.getElementById('email');
        if(emri.value === ""){
            alert("Ju lutem shtoni EMRIN tuaj");
            emri.focus();
            return false;
        }
        if(mbiemri.value === ""){
            alert("Ju lutem shtoni MBIEMRIN tuaj");
            mbiemri.focus();
            return false;
        }
        if(password.value === ""){
            alert("Ju lutem shtoni PASSWORDIN tuaj");
            password.focus();
            return false;
        }
<<<<<<< Updated upstream
       
=======

>>>>>>> Stashed changes
        if(email.value === ""){
            alert("Ju lutem shtoni EMAIL tuaj");
            email.focus();
            return false;
        }
        if(!emailValid(email.value)){
            alert("Ju lutem shtoni Email valid");
            email.focus();
            return false;
        }
        alert("Regjistrimi u krue me sukses!");
        return true;
    }
    

    const emailValid = (email)=> {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
    }
    SubmitButon.addEventListener('click', validate);
    
    
});

function toggleMenu() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active');
}
