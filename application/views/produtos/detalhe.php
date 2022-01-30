
<div class="container">

    <h1>Detalhes do Produto</h1>

    <p>
        Nome: <?= $produto['nome'] ?><br>
        Preco: <?= $produto['preco'] ?><br>
        Descrição: <?= $produto['descricao'] ?><br>
    </p>
    <?= anchor("produtos/index", "Voltar", array("class" => "btn btn-primary")); ?>

    <?= anchor("produtos/delete/{$produto['id']}", "Deletar Produto", array("class" => "btn btn-danger")); ?>

    <?= anchor("produtos/editar?id={$produto['id']}", "Editar", array("class" => "btn btn-default")); ?>

</div>