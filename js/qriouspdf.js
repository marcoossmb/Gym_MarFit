document.addEventListener("DOMContentLoaded", function () {
    const qr = new QRious();

    // Función para generar el código QR y descargar el PDF
    const generateQRCode = (idClase, idUsuario, idReserva) => {
        const fila = document.querySelector(`#fila-${idClase}-${idUsuario}-${idReserva}`);
        if (fila) {
            const tdClase = fila.querySelector("td:nth-child(1)");
            if (tdClase) {
                const qrText = `Clase: ${tdClase.innerText}, Clase ID: ${idClase}, Usuario ID: ${idUsuario}, Reserva ID: ${idReserva}`;
                qr.set({
                    value: qrText,
                });
                downloadPDF(qr.toDataURL());
            }
        }
    };

    // Función para descargar el PDF
    const downloadPDF = (imgData) => {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        const pdfWidth = pdf.internal.pageSize.getWidth();
        const qrWidth = 50;
        const x = (pdfWidth - qrWidth) / 2;

        // Agregar texto
        pdf.setFontSize(12);
        pdf.text("¡Bienvenido a nuestro gimnasio!", pdfWidth / 2, 20, { align: "center" });

        // Agregar imagen del código QR al PDF
        pdf.addImage(imgData, 'PNG', x, 30, qrWidth, qrWidth);

        pdf.text("Este es tu código QR para acceder a la clase.", pdfWidth / 2, 30 + qrWidth + 10, { align: "center" });

        // Guardar el PDF
        pdf.save("QRCode.pdf");
    };

    document.querySelectorAll('[id^="boton-"]').forEach(boton => {
        const ids = boton.id.split("-");
        const idClase = ids[1];
        const idUsuario = ids[2];
        const idReserva = ids[3];
        boton.addEventListener("click", () => generateQRCode(idClase, idUsuario, idReserva));
    });
});
