<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        body{
            background-color: rgb(249 250 251);
        }

        header {
            background-color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        header > div {
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;

            padding-left: 1rem;
            padding-right: 1rem;

            @media (min-width: 640px) {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }


        header .lg\:px-8 {
            @media (min-width: 1024px) {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        header .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        header a {
            display: inline-block;
        }

        header img {
            max-width: 100%;
            height: auto;
        }
    </style>

</head>

<body>


    <header>

        <div>
            <a href="/">
                <img src="{{asset('img/logo.png')}}" alt="">
            </a>
        </div>

    </header>

</body>

</html>
