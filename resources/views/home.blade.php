<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <title>Home</title>
    <style>
        * {
            background-color: #C9C0D5;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        nav {
            width: 100%;
            height: 80px;
            background-color: #684D8C;
            margin-bottom: 15px;
            display: flex;
            justify-content: flex-end;
        }

        nav img {
            max-width: 100%;
            max-height: 100%;
        }

        nav ul {
            list-style: none;
            background-color: #684D8C;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        nav li {
            height: 50px;
        }

        nav a {
            height: 100%;
            background-color: #684D8C;
            padding: 0 30px;
            text-decoration: none;
            display: flex;
            align-items: center;
            color: white;
        }

        nav a img {
            background-color: #684D8C;
            height: 50px;
        }

        nav a:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 200px;
            background-color: white;
            display: none;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .sidebar li {
            width: 100%;
        }

        .sidebar a {
            width: 100%;
            background-color: white;
            color: black;
        }

        i {
            font-size: 50px;
            color: black;
            background-color: white;
        }

        .menu-button {
            display: none;
        }

        .container {
            margin: 0 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .belajar,
        .bermain {
            width: 95%;
            height: 350px;
            border-radius: 10px;
            margin-bottom: 10px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .belajar img,
        .bermain img {
            margin-top: 5px;
        }

        .belajar h2,
        .bermain h2 {
            color: #EC27E4;
            font-family: 'Nerko One', cursive;
            font-size: 40px;
            background-color: white;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 3;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #ABA9AC;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: red;
            float: left;
            font-size: 30px;
            font-weight: bold;
            background-color: white;
            border-radius: 10px;
            width: 50px;
        }

        .close i {
            color: red;
            margin-left: 5px;
        }

        .close i:hover,
        .close i:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 15px;
            background-color: white;
        }

        .profile-info p {
            background-color: #ABA9AC;
        }

        .baris1,
        .baris2 {
            background-color: #ABA9AC;
            display: flex;
            justify-content: center;
            margin-top: 10px;
            gap: 5px;
        }

        .baris1 {
            margin-top: 10%;
            margin-right: 10%;
        }

        .custom-button-logout,
        .custom-button-cancel {
            width: 250px;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            cursor: pointer;
            background-color: #684D8C;
        }

        .custom-button-logout:hover,
        .custom-button-cancel:hover {
            background-color: #7bc89c;
            color: black;
        }

        .custom-swal-title {
            color: black;
            background-color: white;
        }

        @media (min-width: 1024px) {
            nav ul {
                margin-right: 75px;
                margin-left: 500px;
            }

            .belajar,
            .bermain {
                width: 98%;
                height: 245px;
                display: flex;
                flex-direction: row;

            }

            .belajar img,
            .bermain img {
                margin-right: 250px;
            }
        }

        @media (max-width: 800px) {
            .hideOnMobile {
                display: none;
            }

            .menu-button {
                display: block;
            }
        }
    </style>
</head>

<body>
    <audio id="audio" autoplay>
        <source src="assets/ayo.mp3" type="audio/mpeg">
    </audio>

    <audio src="/assets/background.mp3" autoplay loop></audio>

    <nav>
        <img src="assets/minimind.png">

        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><i class="fa-solid fa-xmark"></i></a></li>
            <li onclick=openProfile()><a href="#">Profil</a></li>
            @if(auth()->user()->role == 'guru')
            <li><a href="{{ route ('guru') }}">Data Murid</a></li>
            @endif
            <li onclick=logout()><a href="#">Logout</a></li>
        </ul>

        <ul>
            <li class="hideOnMobile" onclick=openProfile()><a href="#">Profil</a></li>
            @if(auth()->user()->role == 'guru')
            <li class="hideOnMobile"><a href="{{ route ('guru') }}">Data Murid</a></li>
            @endif
            <li class="hideOnMobile" onclick=logout()><a href="#">Logout</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><img src="assets/menu.png"></a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="belajar" onclick="belajar()">
            <img src="assets/belajar.jpg" width="246px" height="216px">
            <h2>BELAJAR</h2>
        </div>

        <div class="bermain" onclick="bermain()">
            <img src="assets/bermain.jpg" width="289px" height="238px">
            <h2>BERMAIN</h2>
        </div>
    </div>

    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeProfile()"><i class="fa-solid fa-xmark"></i></span>
            <div class="baris1">
                <img src="" class="profile-img">
                <img src="" class="profile-img">
            </div>
            <div class="baris2">
                <img src="" class="profile-img">
                <img src="" class="profile-img">
                <img src="" class="profile-img">
            </div>
            <div class="profile-info">
                <p>Nama:</p>
                <p>Kelas:</p>
                <p>Catatan:</p>
            </div>
        </div>
    </div>

    <script>
        function belajar() {
            window.location.href = "{{route ('belajar')}}";
        }

        function bermain() {
            window.location.href = "{{route ('bermain')}}";
        }

        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }

        function openProfile() {
            const modal = document.getElementById('profileModal');
            modal.style.display = 'block';

            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = 'none';
        }

        function closeProfile() {
            const modal = document.getElementById('profileModal');
            modal.style.display = 'none';
        }

        function logout() {
            event.preventDefault(); // Prevent the default link behavior

            Swal.fire({
                title: 'Apakah kamu yakin ingin logout?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                allowOutsideClick: false,
                customClass: {
                    title: 'custom-swal-title',
                    confirmButton: 'custom-button-logout',
                    cancelButton: 'custom-button-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                } else {
                    window.location.href = "{{ route('home') }}";
                }
            });
        }
    </script>
</body>

</html>