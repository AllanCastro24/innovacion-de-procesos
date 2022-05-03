


function result(){
    // Obtener una referencia al elemento canvas del DOM
const $grafica = document.querySelector("#grafica");
// Las etiquetas son las que van en el eje X. 
const etiquetas = ["2009", "2010", "2011", "2012"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datos = {
    label: "Ingresos por año/mes",
    data: [2000, 1500, 5000, 4102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($grafica, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datos,
            // Aquí más datos...
        ],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});

// Obtener una referencia al elemento canvas del DOM
const $grafica2 = document.querySelector("#grafica2");
// Las etiquetas son las que van en el eje X. 
const etiquetas2 = ["2009", "2010", "2011", "2012"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datos2 = {
    label: "Ingresos por año/mes",
    data: [2000, 1500, 5000, 4102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($grafica2, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: etiquetas2,
        datasets: [
            datos2,
            // Aquí más datos...
        ],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});
}