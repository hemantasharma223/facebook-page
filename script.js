const openButton = document.getElementById('open-registration-form');
const registrationForm = document.getElementById('registration-form');


openButton.addEventListener('click', () => {
    registrationForm.style.display = 'block';
});


const closeButton = document.getElementById('close-btn');
closeButton.addEventListener('click', () => {
    registrationForm.style.display = 'none';
}); 