
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="#" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3ebc771fe7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <title>Dashboard</title>
</head>
<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <i class="fa-solid fa-house bi me-2" style="font-size: 40px"></i>

                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link text-secondary">
                            <i class="fa-solid fa-house bi d-block mx-auto mb-1" style="font-size: 25px"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('table') }}" class="nav-link text-white">

                            <i class="fa-solid fa-table-list bi d-block mx-auto mb-1" style="font-size: 25px"></i>
                            Table
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('add') }}" class="nav-link text-white">

                            <i class="fa-solid fa-file-circle-plus bi d-block mx-auto mb-1" style="font-size: 25px"></i>
                            Add item
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">

            </form>

            <div class="text-end">

                <a href="{{ route('logout') }}" type="button" class="btn btn-primary">Log Out</a>
            </div>
        </div>
    </div>
</header>
<body>
