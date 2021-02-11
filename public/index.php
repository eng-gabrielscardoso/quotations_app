<?php
    require_once('../private/config/config.php');
    require_once('../private/class/hg_api.php');

    $hg = new HG_API(HG_API_KEY);
    $usd = $hg->dolar_quotation();

    if($hg->is_error() == false)
    {
        $variation = ($usd['variation'] < 0) ? 'danger' : 'info';
    };
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional CSS -->
    <link rel="stylesheet" href="style/style.css">
    <!-- Title -->
    <title>Cotação do dólar</title>
</head>
<body>
    <div class="col-xs-1-12 centralize">
        <div class="row">
            <h2>Cotação do dólar</h2>
        </div>
        <div class="row">
            <?php if($hg->is_error() == false): ?>
            <h2>USD: <span class="badge badge-<?php echo $variation; ?>"><?php echo ($usd['buy']); ?></span></h2>
            <?php else: ?>
            <h2>USD : <span class="badge badge-warning">Serviço indisponível</span></h2>
            <?php endif; ?> 
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>