
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" type="text/css" href="" media="screen" />
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../loged.html">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../loged.html#last">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../profile/profie.php">Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border p-3 rounded mx-auto">
                <h2>Make a Donation</h2>
                <form class="donateForm" action="donateAction.php" method="POST" >
                    <div class="mb-3 form-floating">
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Donation Amount">
                        <label for="amount">Donation Amount</label>
                        <div class="alert alert-warning collapse" role="alert" id="amountError"></div>

                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control" id="floatingMessage" name="mensagem" placeholder="Your Message" rows="4"></textarea>
                        <label for="floatingMessage">Your Message</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="navbar navbar-expand-lg navbar-dark bg-primary fixed-bottom">
        <div class="container">
            <span class="navbar-text">
                Trabalho Final de PPI - Gabriel da Silva Reis, Humberto Machado, Marcos Aquino
            </span>
        </div>
    </footer>
    <script src="donateValidator.js"></script>
</body>

</html>