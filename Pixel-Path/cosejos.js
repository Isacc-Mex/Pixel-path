 // Array de consejos
 const consejos = [
    "Recuerda tomar descansos regulares durante tus sesiones de juego.",
    "Mantén una postura adecuada para evitar dolores musculares.",
    "Establece metas pequeñas y alcanzables para mejorar tu rendimiento.",
    "No olvides hidratarte mientras juegas.",
    "Dedica tiempo a actividades fuera de los videojuegos para un equilibrio saludable.",
    "Practica la respiración profunda para mantener la calma en situaciones estresantes.",
    "Haz ejercicio regularmente para mantenerte en buena forma física y mental.",
    "Date una pausa y convive",
    "No olvides que no estas solo"
];

// Función para mostrar un consejo aleatorio
function mostrarConsejo() {
    const indice = Math.floor(Math.random() * consejos.length);
    document.getElementById("consejo-texto").innerText = consejos[indice];
}

// Mostrar un consejo al cargar la página
document.addEventListener('DOMContentLoaded', mostrarConsejo);