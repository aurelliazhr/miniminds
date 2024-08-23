<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Murid</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 0;
        }

        .back {
            align-self: flex-start;
            margin-left: 25px;
            margin-bottom: 25px;
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

        img {
            width: 297px;
            height: 287px;
            margin-top: 30px;
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
    <a class="back" href="{{ route('guru') }}">
        <img src="/assets/Back.png" alt="Back">
    </a>

    <div class="container">
    <select id="role" name="kelas" placeholder="kelas" required class="kelas">
            <option value="" disabled selected>Kelas:</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
        </select>

        <div class="button">
            <button type="submit" onclick="data()">Cari Data</button>
        </div>

        <img src="/assets/tambahdata.jpg">
    </div>

    <script>
        function data() {
            window.location.href = "{{ route ('data') }}";
        }
    </script>
</body>

</html>