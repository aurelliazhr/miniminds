<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Murid</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <style>
        body {
            background-color: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 0;
        }

        form {
            margin: 0;
            padding: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back {
            align-self: flex-start;
            margin-left: 25px;
            margin-bottom: 10px;
            margin-top: 20px; 
        }

        .back img {
            width: 42px;
            height: 32px;
        }

        .container {
            width: 90%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 15px;
        }

        .container img {
            width: 200px;
            height: 190px;
            margin-top: 200px;
        }

        .kelas {
            width: 82%;
            height: 60px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 20px;
            margin-bottom: 20px;
            margin-left: 30px;
            padding: 20px;
            background-color: #D9D9D9;
        }

        #role {
            border-radius: 10px;
        }

        .button {
            text-align: center;
            width: 100%;
            height: 70px;
            margin-left: 15px;
        }

        button {
            width: 82%;
            height: 70px;
            margin-top: 10px;
            margin-left: 10px;
            background-color: #9CE6BB;
            color: #fff;
            font-family: 'Nerko One', cursive;
            font-size: 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ccc;
            color: black;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <audio id="audio" autoplay>
        <source src="assets/melihat.mp3" type="audio/mpeg">
    </audio>

    <form action="{{ route('melihat-proses') }}" method="post">
        @csrf

        <a class="back" href="{{ route('guru') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="container">
            {{-- <select id="role" name="kelas" placeholder="kelas" required class="kelas">
                <option value="" disabled selected>Kelas:</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="B3">B3</option>
            </select>

            <div class="button">
                <button type="submit">Cari Data</button>
            </div> --}}

            <div class="button">
                <button type="submit" name="kelas" value="B1">B1</button>
                <button type="submit" name="kelas" value="B2">B2</button>
                <button type="submit" name="kelas" value="B3">B3</button>
        
            </div>

            <img src="/assets/tambahdata.jpg">
        </div>
    </form>
</body>

</html>