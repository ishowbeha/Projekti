document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById('btn');
    const form = document.getElementById('form'); // Sigurohuni që forma ka një ID

    const validate = (ngjarja) => {
        const emri = document.getElementById('emri');
        const mbiemri = document.getElementById('mbiemri');
        const password = document.getElementById('pass');
        const email = document.getElementById('email');

        // Validimet
        if (emri.value.trim() === "") {
            alert("Ju lutem shtoni EMRIN tuaj");
            emri.focus();
            ngjarja.preventDefault(); // Parandalon dërgimin në rast gabimi
            return false;
        }

        if (mbiemri.value.trim() === "") {
            alert("Ju lutem shtoni MBIEMRIN tuaj");
            mbiemri.focus();
            ngjarja.preventDefault();
            return false;
        }

        if (password.value.trim() === "") {
            alert("Ju lutem shtoni PASSWORDIN tuaj");
            password.focus();
            ngjarja.preventDefault();
            return false;
        }

        if (email.value.trim() === "") {
            alert("Ju lutem shtoni EMAIL tuaj");
            email.focus();
            ngjarja.preventDefault();
            return false;
        }

        if (!emailValid(email.value)) {
            alert("Ju lutem shtoni një Email valid");
            email.focus();
            ngjarja.preventDefault();
            return false;
        }
        

        // Nëse të gjitha janë të sakta, forma lejohet të dërgohet
        
        return true; // Forma do të dërgohet në PHP
    };

    const emailValid = (email) => {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
    };

    if (form) {
        form.addEventListener('submit', (ngjarja) => {
            if (!validate(ngjarja)) {
                ngjarja.preventDefault(); // Parandalon dërgimin nëse ka gabime
            }
        });
    } else {
        console.error("Forma me id 'form' nuk u gjet. Kontrolloni HTML-në.");
    }
});