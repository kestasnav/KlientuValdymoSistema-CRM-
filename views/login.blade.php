<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style type="text/css">
        .curr {
            text-align: right;
        }
    </style>
</head>

<body>
<div class="container mb-3" id="content" tabindex="-1">

    <div class="row">

        <div class="card mt-3">

            <div class="card-header">

                <h1>Prisijunkite</h1>
            </div>
            <div class="card-body">
                <div class="col-md-6 d-flex flex-row">
                   <form action="login.php" method="POST">
                       <input type="hidden" name="action" value="login">
                       <input class="mt-3 mb-3" type="text" name="username" placeholder="Username"><br>
                       <input type="password" name="password" placeholder="Password"><br>
                       <button class="btn btn-success mt-3" type="submit" name="submit">Prisijungti</button>
                   </form>

                </div>
            </div>
            <h1 class="mx-3">{{$message}}</h1>
        </div>
    </div>

