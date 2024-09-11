let timeSpent = sessionStorage.getItem('timeSpent') ? parseInt(sessionStorage.getItem('timeSpent')) : 0;
let isTracking = true;
const pagesToShowNotification = ["home", "belajar", "bermain"];
let notifikasiTerkirim = sessionStorage.getItem('notifikasiTerkirim') === 'true';

function shouldShowNotification() {
    const currentPage = window.location.pathname.split("/").pop();
    return pagesToShowNotification.includes(currentPage);
}

const interval = setInterval(() => {
    if (isTracking && !notifikasiTerkirim) {
        timeSpent += 1;
        sessionStorage.setItem('timeSpent', timeSpent);

        if (timeSpent >= 3600 && shouldShowNotification()) {
            Swal.fire({
                title: 'Waktu Belajar dan Bermain Telah Selesai',
                text: 'Silahkan Tutup Situs Ini, Ya!',
                icon: 'warning',
                // showCloseButton: true
            });

            sessionStorage.setItem('notifikasiTerkirim', 'true'); 
            clearInterval(interval);
        }
    }
}, 1000);

document.addEventListener("visibilitychange", () => {
    isTracking = !document.hidden;
});
