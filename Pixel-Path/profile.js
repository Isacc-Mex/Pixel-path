document.addEventListener('DOMContentLoaded', function() {
    // Hacer una solicitud al archivo PHP para obtener los datos del perfil
    fetch('profile.php')
        .then(response => response.json())
        .then(data => {
            // Rellenar los datos del perfil en el HTML
            document.getElementById('profile-info').innerHTML = `
                <p><strong>Nombre de usuario:</strong> ${data.username}</p>
                <p><strong>Email:</strong> ${data.email}</p>
            `;

            // Rellenar el formulario de edición con los datos del perfil
            document.getElementById('username').value = data.username;
            document.getElementById('email').value = data.email;
        })
        .catch(error => console.error('Error:', error));
});
