<?php
    require_once "../UsuarioEntidade.php";
    session_start();
    if(!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
        header("Location: login.php");
    }
    else {
        $usuario = $_SESSION["usuario"];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
                        <a class="nav-link" href="../loged.html">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../donate/donate.php">Doar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-5 mb-5">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-6 border p-3 rounded mx-auto">
                <h2 class="text-center">User Profile</h2>
                
                <div class="mb-3 d-flex flex-column align-items-center border-top">
                    <img id="profileImage" src="default.jpg" alt="Profile Image" class="img-fluid mx-auto d-block mb-2" width="200">
                    <input type="file" id="imageUpload" accept="image/*" style="display: none;">
                </div>
                
                
                <div class="mb-3 border rounded p-2">
                    <label for="profileName" class="form-label">Nome:</label>
                    <div id="profileName" class="profile-info"><?= $usuario->getNome();?></div>
                </div>

                <div class="mb-3 border rounded p-2">
                    <label for="profileEmail" class="form-label">Email:</label>
                    <div id="profileEmail" class="profile-info"><?= $usuario->getEmail();?></div>

                    <button id="changeEmailBtn" type="button" class="btn btn-secondary mt-2">Change Email</button>
                </div>
                
                <div class="mb-3 border rounded p-2">
                    <label for="profileCPF" class="form-label">CPF:</label>
                    <div id="profileCPF" class="profile-info"><?= $usuario->getCpf();?></div>
                </div>
    
                <div class="mb-3 border rounded p-2">
                    <label for="profileDateOfBirth" class="form-label">Data de Nascimento:</label>
                    <div id="profileDateOfBirth" class="profile-info"><?= $usuario->getDataNascimento();?></div>
                </div>
                
                
                <h2>Histórico</h2>
                <div id="donationHistory" class="mb-3 p-2 border rounded">
                    <table id="dtDonationHistory" class="display">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody id="donationHistoryList"></tbody>
                    </table>
                </div>


                <div class="mb-3 d-flex justify-content-around">
                    <button id="logoutBtn" class="btn btn-danger">Log-out</button>
                    <form id="deleteAccountForm" action="delete.php" method="POST">
                        <button type="submit" class="btn btn-danger" name="delete">Delete Account</button>
                    </form>
                </div>
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

    
    <script>
    $(document).ready(function () {
        var tabela = $('#dtDonationHistory').DataTable({
            "ajax": {
                "url": "listaDonation.php",
                "dataSrc": ""
            },
            "columns": [
                { "data": "Data" },
                { "data": "Valor" }
            ]
        });

        $("#changeEmailBtn").click(function () {
            var newEmail = prompt("Novo Email:");

            if (newEmail) {
                $.ajax({
                    type: "POST",
                    url: "updateEmail.php",
                    data: { newEmail: newEmail },
                    success: function (response) {
                        if (response === "success") {
                            $("#profileEmail").text(newEmail);
                            alert("Sucesso!");
                        } else {
                            alert("Error ao atualizar email.");
                        }
                    },
                    error: function () {
                        alert("Erro");
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#logoutBtn").click(function () {
            window.location.href = "logout.php";
        });
    });
</script>

    
</body>

</html>