(async () => {
    const respuestaRaw = await fetch("http://localhost/_servWeb/restfulApiGymMarFit/Materiales.php");
    const materiales = await respuestaRaw.json();

    const nombresMateriales = materiales.map(material => material.nombre);
    const stock = materiales.map(material => material.stock);

    const colores = [
        'rgba(255, 99, 132, 0.8)',
        'rgba(54, 162, 235, 0.8)',
        'rgba(255, 206, 86, 0.8)',
        'rgba(75, 192, 192, 0.8)',
        'rgba(153, 102, 255, 0.8)',
        'rgba(255, 159, 64, 0.8)',
        'rgba(139, 69, 19, 0.8)',
        'rgba(255, 99, 71, 0.8)',
        'rgba(144, 238, 144, 0.8)',
        'rgba(255, 140, 0, 0.8)'
    ];

    const $grafica = document.querySelector("#grafica");
    new Chart($grafica, {
        type: 'pie',
        data: {
            labels: nombresMateriales,
            datasets: [{
                    label: 'Stock (unidades)',
                    data: stock,
                    backgroundColor: colores,
                    borderColor: colores.map(color => color.replace('0.8', '1')),
                    borderWidth: 4,
                    hoverBorderWidth: 6,
                    borderAlign: 'inner'
                }]
        },
        options: {
            animation: {
                duration: 1500,
                easing: 'easeInOutQuad'
            },
            legend: {
                position: 'bottom',
                labels: {
                    fontSize: 14,
                    padding: 20
                }
            }
        }
    });

})();

//Usuarios por clases
(async () => {
    const respuestaRaw2 = await fetch("http://localhost/_servWeb/restfulApiGymMarFit/Clases.php?recuento");
    const clases = await respuestaRaw2.json();

    const nombresClases = clases.map(clase => clase.title);
    const usuarios = clases.map(clase => clase.NumeroUsuarios);

    // Calcula el total de usuarios en todas las clases
    const totalUsuarios = usuarios.reduce((total, numUsuarios) => total + numUsuarios, 0);

    const colores2 = [
        'rgba(255, 99, 132, 0.8)',
        'rgba(54, 162, 235, 0.8)',
        'rgba(255, 206, 86, 0.8)',
        'rgba(75, 192, 192, 0.8)',
        'rgba(153, 102, 255, 0.8)',
        'rgba(255, 159, 64, 0.8)'
    ];

    const $grafica_alum = document.querySelector("#grafica_alum");
    new Chart($grafica_alum, {
        type: 'bar',
        data: {
            labels: [...nombresClases, 'Total'],
            datasets: [{
                    label: 'Usuarios',
                    data: [...usuarios, totalUsuarios],
                    backgroundColor: [...colores2],
                    borderColor: [...colores2.map(color => color.replace('0.8', '1'))],
                    borderWidth: 4,
                    hoverBorderWidth: 6,
                    borderAlign: 'inner'
                }]
        },
        options: {
            animation: {
                duration: 1500,
                easing: 'easeInOutQuad'
            },
            legend: {
                position: 'bottom',
                labels: {
                    fontSize: 14,
                    padding: 20
                }
            }
        }
    });

})();