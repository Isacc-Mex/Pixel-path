
    
    document.addEventListener('DOMContentLoaded', function() {
        const username = new URLSearchParams(window.location.search).get('username') || 'usuario';
        const welcomeMessage = document.querySelector('#loading-screen h2');
        welcomeMessage.textContent = `¡Hola de nuevo, ${username}!`;
        
        // Redirigir a la página principal después de 3 segundos
        setTimeout(function() {
            window.location.href = `main.html?username=${username}`;
        }, 3000);
    });
