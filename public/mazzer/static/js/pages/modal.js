const openModalButton = document.getElementById('openModal');
const closeModalButton = document.getElementById('closeModal');
const modal = document.getElementById('myModal');

// Open modal
openModalButton.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Close modal
closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden');
});
