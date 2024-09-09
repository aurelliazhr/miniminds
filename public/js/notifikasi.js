let timeSpent = localStorage.getItem('timeSpent') ? parseInt(localStorage.getItem('timeSpent')) : 0;

const interval = setInterval(() => {
    timeSpent += 1;
    localStorage.setItem('timeSpent', timeSpent);
    
    if(timeSpent >= 10) {
        Swal.fire({
            title: 'Waktu Belajar dan Bermain Telah Selesai',
            text: 'Silahkan Tutup Situs Ini, Ya!',
            icon: 'warning',
            // confirmButtonText: 'Oke',
            showCloseButton: true  
        });

        clearInterval(interval);

        localStorage.setItem('timeSpent', 0);
    }
}, 1000);

// function showNotification() {
//     Swal.fire({
//         title: 'Waktu Belajar dan Bermain Telah Selesai',
//         text: 'Silahkan Tutup Situs Ini, Ya!',
//         icon: 'warning',
//         // confirmButtonText: 'Oke',
//         showCloseButton: true  
//     });
// }

// setTimeout(showNotification, 10000);