<?php include("header.php") ?>
<style>
    body {
        background-color: black; /* Fundo preto */
       /*color: white; /* Texto branco */
    }
</style>

    <div class="container-fluid text-center">

        <h2 style="color:#3b7086;">Cadastro de Usuário:</h2>

        <div class="d-flex justify-content-center mb-3">

            <div class="row">

                <div class="col-sm-12">

                    <form action="actionUsuario.php" class="was-validated" method="POST" enctype="multipart/form-data">

                        <div class="form-floating mb-3 mt-3">
                            <input type="file" class="form-control" id="fotoUsuario" name="fotoUsuario" required>
                            <label for="fotoUsuario" class="form-label">Foto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="nomeUsuario" placeholder="Informe o seu nome" name="nomeUsuario" required>
                            <label for="nomeUsuario" class="form-label">Nome:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <select class="form-select" id="cursoUsuario" name="cursoUsuario" required>
                                <option value="informatica" selected>Informática para Internet</option>
                                <option value="jogos">Programação de Jogos Digitais</option>
                                <option value="mecanica">Mecânica</option>
                                <option value="automacao">Automação Industrial</option>
                            </select>
                            <label for="cursoUsuario" class="form-label">Curso:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="email" class="form-control" id="emailUsuario" placeholder="Informe o seu email" name="emailUsuario" required>
                            <label for="emailUsuario" class="form-label">Email:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="password" class="form-control" id="senhaUsuario" placeholder="Informe uma senha" name="senhaUsuario" required>
                            <label for="senhaUsuario" class="form-label">Senha:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="password" class="form-control" id="confirmarSenhaUsuario" placeholder="Confirme a senha" name="confirmarSenhaUsuario" required>
                            <label for="confirmarSenhaUsuario" class="form-label">Confirme a Senha:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
       
    </div>

<?php include("footer.php") ?>