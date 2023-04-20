<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faboce S.R.L.</title>
    <link rel="icon" type="image/png" href="icon/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #243747;
            background-image: url("images/texture-blue.jpg");
            color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #fff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .planta {
            border-radius: 20px;
            width: 800px;
        }

        @media (max-width: 600px) {
            .planta {
                border-radius: 20px;
                width: 400px;
            }
        }

        @media (min-width: 700px) and (orientation: landscape) {
            .planta {
                border-radius: 20px;
                width: 400px;
            }
        }

        @media (min-width: 1024px) and (orientation: landscape) {
            .planta {
                border-radius: 20px;
                width: 900px;
            }
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <?php if(Route::has('login')): ?>
            <div class="top-right links animate__animated animate__zoomIn">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/home')); ?>">Home</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Acceso</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="content animate__animated animate__zoomIn">
            <div class="title m-b-md">
                <img src="images/faboce.png" alt="Faboce S.R.L.">
                <br>
                <img src="images/PORCELANATO.JPG" class="planta" alt="Fabrica Porcelanato">
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\faboce2023\resources\views/welcome.blade.php ENDPATH**/ ?>