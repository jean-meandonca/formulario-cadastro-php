<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
    <body class="bg-light">

   <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $endereco = $_POST['endereco'];
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
                echo 'Email inválido';
            } else {
                    $email = $_POST['email'];
                    $pdo = new PDO('pgsql:host=localhost;dbname=formulario-cadastro-php', 'postgres', '1234');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = $pdo->prepare("INSERT INTO clientes (nome, sobrenome, email, endereco) VALUES (?, ?, ?, ?)");
                    $sql->execute([$nome, $sobrenome, $endereco,$email]);
                    
                    echo 'Cadastro realizado com sucesso!';
            };
           
        }
    ?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Formulário de Cadastro</h2>
    </div>
      <div class="col-md-12">
        <h4 class="mb-3">Informações para cadastro</h4>
        <form class="needs-validation" method="post">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Primeiro nome</label>
              <input name="nome" type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Último nome</label>
              <input name="sobrenome" type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input name="email" type="text" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input name="endereco" type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="acao">Cadastrar</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2022 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
