document.addEventListener('DOMContentLoaded', (event) => {
    const selectElement = document.querySelector('.select-clases');

    selectElement.addEventListener('change', (event) => {
        const claseId = event.target.value;
        //const classReserv = document.querySelector('.class-reserv');

        if (claseId) {
            fetch(`http://localhost/_servWeb/restfulApiGymMarFit/Clases.php?id_clase=${claseId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Mostrar la información de la clase debajo del select
                        const classInfoDiv = document.querySelector('.class-description');
                        classInfoDiv.innerHTML = `
                            <hr class="mt-5">
                            <div class="container mt-5 mb-5">
                                <div class="d-flex">
                                    <div class="col-7">
                                        <h2 class="mb-4">Información de la Clase</h2>
                                        <p><strong>Nombre:</strong> ${data.title}</p>
                                        <p><strong>Descripción:</strong> ${data.descripcion}</p>
                                        <p><strong>Duracion:</strong> ${data.duracion} min</p>
                                        <p><strong>Monitor/a:</strong> ${data.moninombre} ${data.moniapellido}</p>
                                    </div>
                                    <div  class="col-4">
                                        <img src="./assets/images/class/${data.title}.jpg" class="img-fluid" alt="clase">
                                    </div>
                                </div>
                            </div><hr class="mt-5">
                            <form id="reservaForm" method="POST" action="#">
                                ${generateDateOptions(data.title)}
                                <input type="submit" class="btn btn-dark" value="Reservar">
                            </form>
                        `;
                        //classReserv.style.display = "block";
                    })
                    .catch(error => console.error('Error fetching class info:', error));
        }
    });

    function generateDateOptions(className) {
        let validDays = [];

        if (className === 'Yoga') {
            validDays = [1, 5]; // Lunes y Viernes
        } else if (className === 'Cardio') {
            validDays = [1, 4, 6]; // Lunes, Jueves y Sábado
        } else if (className === 'Boxeo' || className === 'Spinning') {
            validDays = [2, 3]; // Martes y Miércoles
        } else if (className === 'Zumba') {
            validDays = [2, 4]; // Martes y Jueves
        } else if (className === 'Pilates') {
            validDays = [5, 6]; // Viernes y Sábado
        }

        if (validDays.length === 0)
            return '';

        const today = new Date();
        const oneMonthFromNow = new Date();
        oneMonthFromNow.setMonth(today.getMonth() + 1);

        let dateOptions = '<p>Selecciona una fecha:</p> <select class="border-0 select-day" name="date" id="date" required><option selected disabled value="">Fecha</option>';
        for (let d = new Date(today); d <= oneMonthFromNow; d.setDate(d.getDate() + 1)) {
            const day = d.getDay();
            if (validDays.includes(day)) {
                const dateStr = d.toISOString().split('T')[0]; //Para coger la fecha excluyendo la hora
                const dayName = getDayName(day); // Para obtener el nombre del día
                dateOptions += `<option value="${dateStr}">${dateStr} ➡️ ${dayName}</option>`;
            }
        }
        dateOptions += '</select>';
        return dateOptions;
    }

    function getDayName(day) {
        const days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        return days[day];
    }
});