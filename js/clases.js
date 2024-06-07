document.addEventListener('DOMContentLoaded', (event) => {
    const selectElement = document.querySelector('.select-clases');

    selectElement.addEventListener('change', (event) => {
        const claseId = event.target.value;

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
                                <div class="col-4">
                                    <img src="./assets/images/class/${data.title}.jpg" class="img-fluid rounded" alt="clase">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <form id="reservaForm" method="POST" action="./index.php?controller=Clase&action=reservarClase">
                            ${generateDateOptions(data.title)}
                            <div id="time-container"></div>
                            <input type="hidden" value="${data.title}" name="clase">
                            <input type="submit" class="btn btn-dark mt-3" value="Reservar">
                        </form>
                    `;

                        const dateSelect = document.querySelector('#date');
                        dateSelect.addEventListener('change', (event) => {
                            const selectedDate = new Date(event.target.value);
                            const selectedDay = selectedDate.getDay();
                            document.querySelector('#time-container').innerHTML = generateTimeOptions(data.title, selectedDay);
                        });
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
        const startOfAugust = new Date(today.getFullYear(), 7, 1);

        let dateOptions = '<p>Selecciona una fecha:</p> <select class="border-0 select-day mr-5" name="date" id="date" required><option selected disabled value="">Fecha</option>';
        for (let d = new Date(today); d <= startOfAugust; d.setDate(d.getDate() + 1)) {
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

    function generateTimeOptions(className, day) {
        let timeOptions = '<p class="mt-3">Horas disponibles:</p> <select class="border-0 select-hour mr-5" name="time" id="time" required><option selected disabled value="">Hora</option>';

        const timeSlots = {
            'Yoga': {1: ['16:00'], 5: ['08:00']},
            'Cardio': {1: ['08:00'], 4: ['17:30'], 6: ['09:00']},
            'Boxeo': {2: ['12:00'], 3: ['10:15']},
            'Spinning': {2: ['09:00'], 3: ['12:30']},
            'Zumba': {2: ['16:30'], 4: ['10:00']},
            'Pilates': {5: ['12:50'], 6: ['13:00']}
        };

        if (timeSlots[className] && timeSlots[className][day]) {
            timeSlots[className][day].forEach(time => {
                timeOptions += `<option value="${time}">${time}</option>`;
            });
        } else {
            timeOptions += `<option selected disabled value="">No hay horas disponibles</option>`;
        }

        timeOptions += '</select>';
        return timeOptions;
    }
});
