document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        var id_monitor = calendarEl.dataset.idMonitor;
        var url = `http://localhost/_servWeb/restfulApiGymMarFit/Reservas.php?id_monitor=${id_monitor}`;

        // Solicitar eventos desde el servidor
        fetch(url)
                .then(response => response.json())
                .then(events => {
                    if (!Array.isArray(events)) {
                        events = [events];
                    }
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: 'es',
                        events: events
                    });
                    calendar.render();
                })
                .catch(error => console.error("Error al cargar eventos: ", error));
    } else {
        console.error("El elemento con id 'calendar' no se encontró en el DOM.");
    }
});