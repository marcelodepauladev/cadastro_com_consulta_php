<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiculos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Consultar Veiculos</h3>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Cor</th>
                            <th>Valor</th>
                            <th>Ano</th>
                            <th>Remover</th>
                        </thead>
                        <tbody>
                            <?php
                            include_once('conexao.php');

                            $sql = 'SELECT * FROM carros ORDER BY id';

                            $resultado = mysqli_query($conexao, $sql);

                            while ($dados = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <td><?= $dados['modelo'] ?></td>
                                    <td><?= $dados['marca'] ?></td>
                                    <td><?= $dados['cor'] ?></td>
                                    <td><?= $dados['valor'] ?></td>
                                    <td><?= $dados['ano'] ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-xs" onclick="document.getElementById('id_exclusao').value=<?= $dados['id'] ?>" data-title="Delete" data-toggle="modal" data-target="#delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }

                            mysqli_close($conexao);
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <div class="col-auto mt-3">
                        <div>
                            <input type="button" onclick="window.location='form_veiculos.php'" value="Cadastrar um veiculo" class="btn btn-primary mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h4 class="modal-title custom_align" id="Heading">Excluir veiculo</h4>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir este veiculo?
                </div>
                <div class="modal-footer ">
                    <input type="hidden" id="id_exclusao">
                    <button onclick="window.location='excluir_veiculo.php?id='+document.getElementById('id_exclusao').value" type="button" class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-sign"></span> Sim
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Não
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>