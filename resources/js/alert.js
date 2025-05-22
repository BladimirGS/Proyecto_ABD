document.addEventListener("livewire:init", () => {
    Livewire.on("exito", () => {
        Swal.fire({
            title: "Operación Exitosa",
            icon: "success",
            confirmButtonColor: "#7066e0",
            confirmButtonText: "Bien",
            customClass: {
                confirmButton: 'btn-ok'
            }
        });
    });
});
