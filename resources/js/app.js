import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onload = (event) => {
    let formToDelete = null;

    // Handle delete button clicks
    document.querySelectorAll('.delete_object').forEach(function(element) {
        element.addEventListener('click', function() {
            const form_id = this.getAttribute('data-form_id');
            formToDelete = document.getElementById(form_id);

            document.getElementById('confirmModal').classList.remove('hidden');
        });
    });

    // Handle confirmation button click
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (formToDelete) {
            formToDelete.submit();
        }
        document.getElementById('confirmModal').classList.add('hidden');
    });

    // Handle cancellation button click
    document.getElementById('cancelDelete').addEventListener('click', function() {
        document.getElementById('confirmModal').classList.add('hidden');
    });
};
