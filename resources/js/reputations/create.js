import Swal from "sweetalert2";

const handleAddRepForm = () => {
    const $form = document.getElementById('add-rep');
    const alertTitle = '¡Estás a punto de añadir un punto de reputación!';
    const alertContent = `
        Al continuar estás consciente de lo siguiente:<br><br>
        <ol>
            <li>Deberás esperar un (1) mes antes de poder eliminar o modificar la reputación a este usuario.</li>
            <li>Tu punto de reputación impactará la forma en que se percibe a éste usuario dentro de VenRep.</li>
        </ol>
    `;

    $form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const response = await Swal.fire({
            title: alertTitle,
            html: alertContent,
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Entiendo, deseo continuar',
            customClass: {
                confirmButton: 'btn btn-primary btn-lg',
                cancelButton: 'btn btn-secondary btn-lg'
            },
        })

        if (response.isConfirmed) {
            $form.submit();
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
    handleAddRepForm();
});