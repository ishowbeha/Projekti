document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('form');
    const submitButton = document.getElementById('btn');
    const password = document.getElementById('pass'); 

    const validate = (event) => {
        const emri = document.getElementById('emri');
        const mbiemri = document.getElementById('mbiemri');
        const email = document.getElementById('email');
        const gender = document.querySelector('input[name="gender"]:checked');
        const day = document.querySelector('select[name="day"]');
        const month = document.querySelector('select[name="month"]');
        const year = document.querySelector('select[name="year"]');

        if (emri.value.trim() === "") {
            emri.focus();
            event.preventDefault(); 
            return false;
        }
        if (mbiemri.value.trim() === "") {
            mbiemri.focus();
            event.preventDefault();
            return false;
        }
        if (password.value.trim() === "") {
            password.focus();
            event.preventDefault();
            return false;
        }
        if (password.value.length < 8) {
            password.focus();
            event.preventDefault(); 
            return false;
        }
        if (email.value.trim() === "") {
            email.focus();
            event.preventDefault();
            return false;
        }

        if (!emailValid(email.value)) {
            email.focus();
            event.preventDefault();
            return false;
        }
        if (!gender) {
            event.preventDefault();
            return false;
        }
        if (!day.value || !month.value || !year.value) {
            event.preventDefault();
            return false;
        }
        return true;
    };

    const emailValid = (email) => {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
    };

    if (form) {
        form.addEventListener('submit', (event) => {
            if (!validate(event)) {
                event.preventDefault(); 
            }
        });
    } else {
        console.error("Forma me id 'form' nuk u gjet. Kontrolloni HTML-në.");
    }
});
