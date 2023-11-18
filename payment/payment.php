<?php
    require_once "../UsuarioEntidade.php";
    session_start();
    if(!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
        header("Location: login.php");
    }
    else {
        $usuario = $_SESSION["usuario"];
    }

    function generateRandomUuid() {
        $data = openssl_random_pseudo_bytes(16);
    
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    
    $uuid = generateRandomUuid();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
                        <a class="nav-link" href="../index.html">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html#last">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../donate/donate.php">Doar</a>
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
                <h2>User Profile</h2>
                <div class="mb-3">
                    <label for="profileName" class="form-label">Nome</label>
                    <div id="profileName" class="profile-info"><?= $usuario->getNome();?></div>
                </div>
                <div class="mb-3">
                    <label for="profileEmail" class="form-label">Email</label>
                    <div id="profileEmail" class="profile-info"><?= $usuario->getEmail();?></div>
                </div>
                <div class="mb-3">
                    <label for="profileCPF" class="form-label">CPF</label>
                    <div id="profileCPF" class="profile-info"><?= $usuario->getCpf();?></div>
                </div>
    
                <h2>Código Pix</h2>
                <div id="qrcode" class="mb-3 text-primary font-weight-bold display-6">
                     <?php echo $uuid; ?>
                </div>
                <p>O pagamento deve ser efetuado em até 24hrs, após esse período deve ser gerada uma nova doação.</p>
    
                <a href="../loged.html" class="btn btn-primary" role="button">Página Inicial</a>
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
    <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
    </script>
</body>

</html>