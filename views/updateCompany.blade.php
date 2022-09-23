<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kompanijos atnaujinimas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">Redaguoti įmonės informaciją</div>
                <div class="card-body">


                    <form action="" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="{{$updateCompany->id}}" >
                        <div class="mb-3">
                            <label for="" class="form-label">Pavadinimas</label>
                            <input name="name" type="text" class="form-control" value="{{$updateCompany->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Adresas</label>
                            <input name="address" type="text" class="form-control" value="{{$updateCompany->address}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Vat Kodas</label>
                            <input name="vat_code" type="text" class="form-control" value="{{$updateCompany->vat_code}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pilnas Kompanijos pavadinimas</label>
                            <input name="company_name" type="text" class="form-control" value="{{$updateCompany->company_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Telefonas</label>
                            <input name="phone" type="text" class="form-control" value="{{$updateCompany->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">El. Paštas</label>
                            <input name="email" type="text" class="form-control" value="{{$updateCompany->email}}">
                        </div>



                                <button class="btn btn-success">Redaguoti</button>
                                <a href="index.php" class="btn btn-info float-end">Atgal</a>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
