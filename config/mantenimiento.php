<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://i.ibb.co/Tk4ZZQ3/7498495-removebg-preview.png" />
    <title>Mantenimiento</title>
    <style>
        body {
            background-image: url('http://www.rooseveltschool.edu.mx/wp-content/uploads/2021/08/pa%CC%81gina-en-mantenimiento.png' );
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .loader {
            width: 320px;
            height: 320px;
            background-image: url('https://i.ibb.co/bdSy9V2/images-removebg-preview.png');
            background-size: cover;
            border-radius: 70%;
            animation: spin 15s linear infinite;
            position: relative;
            top: -20%;
            left: -40%;
            margin-top: -60px; /* La mitad de la altura */
            margin-left: 150px; /* La mitad del ancho */
        }

        .gear2 {
            width: 180px;
            height: 180px;
            background-image: url('https://i.ibb.co/bdSy9V2/images-removebg-preview.png');
            background-size: cover;
            border-radius: 60%;
            animation: spin 7s linear infinite;
            position: absolute;
            top: 70%;
            left: 50%;
            margin-top: -60px; /* La mitad de la altura */
            margin-left: 250px; /* La mitad del ancho */
        }

        .gear3 {
            width: 170px;
            height: 170px;
            background-image: url('https://i.ibb.co/bdSy9V2/images-removebg-preview.png');
            background-size: cover;
            border-radius: 70%;
            animation: spin 12s linear infinite;
            position: absolute;
            top: 50%;
            left: 48%;
            margin-top: -140px; /* La mitad de la altura */
            margin-left: -370px; /* La mitad del ancho */
        }

        .gear4 {
            width: 320px;
            height: 320px;
            background-image: url('https://i.ibb.co/bdSy9V2/images-removebg-preview.png');
            background-size: cover;
            border-radius: 70%;
            animation: spin 15s linear infinite;
            position: relative;
            top: -20%;
            left: -40%;
            margin-top: -60px; /* La mitad de la altura */
            margin-left: -130px; /* La mitad del ancho */
        }


        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        h1{
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Botón de regresar-->
<a href="../index.php?c=escolars&a=index" class="btn btn-primary">Regresar</a>
    <div class="loader"></div>
    <!-- Agrega el segundo engranaje -->
    <div class="gear2"></div>
    <!-- Agrega el tercer engranaje -->
    <div class="gear3"></div>
    <!-- Agrega el cuarto engranaje -->
    <div class="gear4"></div>
</body>
</html>