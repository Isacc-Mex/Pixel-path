// Datos de ejemplo (puedes reemplazarlos con datos reales de tu plataforma)
const datosMetas = {
    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
    datasets: [{
        label: 'Metas Alcanzadas',
        backgroundColor: 'rgb(54, 162, 235)',
        borderColor: 'rgb(54, 162, 235)',
        data: [5, 7, 3, 8, 6, 4], // Datos de metas alcanzadas por mes
    }]
};

// Configuración de la gráfica
const configMetas = {
    type: 'line', // Tipo de gráfico (en este caso, línea)
    data: datosMetas,
    options: {
        scales: {
            y: {
                beginAtZero: true // Empezar el eje Y en 0
            }
        }
    },
};

// Dibujar la gráfica en el canvas con id 'graficaMetas'
var graficaMetas = new Chart(
    document.getElementById('graficaMetas'),
    configMetas
);
