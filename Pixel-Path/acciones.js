document.addEventListener('DOMContentLoaded', function() {
    const character = document.getElementById('character');
    
    // Mensaje de bienvenida al cargar la página
    setTimeout(() => {
        alert('siempre sera agradable saber de ti');
    }, 1000);
    
    // Interacción con el usuario al hacer clic en el personaje
    character.addEventListener('click', () => {
        alert('jsjsjs, me haces cosquillas, ¿necesitas ayuda?');
    });

    // Respuestas personalizadas basadas en la navegación
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            alert('Recuerda tomar descansos mientras navegas.');
        }
    });
});
