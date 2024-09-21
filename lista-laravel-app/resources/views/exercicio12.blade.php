
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercicio 12</title>
    <style>
        .exercicio {
            width: 3em;
            height: 3em;
            border-radius: 100%;
            font-size: large;
            font-weight: bolder;
            background-color: #fd8900;
            color: #fff;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .container-sm .exercicio {
            margin-top: 1em;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }
        .container-sm {
            max-width: 740px;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
            border-radius: 4px;
        }

    </style>
</head>

<body>
    <div class="container-sm border mt-4">
        <div class="exercicio">12</div>
        <span class="text-center"><p class="fw-bold fs-4 text mt-4">Calculo da base elevada ao expoente </p></span>
        
        <form class="row g-3 mt-4" action="/resultado-exercicio-12" method="POST">
            @CSRF
            @method('GET')
            <div class="col-sm-6">
                <div class="form-floating mb-3">
                <input type="text" name="base" id="base" class="form-control">
                    <label for="base" class="form-label">Base</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-3">
                <input type="text" name="expoente" id="expoente" class="form-control">
                    <label for="expoente" class="form-label">Expoente</label>
                </div>
            </div>

            <div class="row g-2 mb-4 p-2">
                <div class="col-sm-6 d-grid ">
                    <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa-solid fa-house me-2"></i></a>
                </div>
                <div class="col-sm-6 d-grid ">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>



    <script src="https://kit.fontawesome.com/d12d816b50.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>

</html>

