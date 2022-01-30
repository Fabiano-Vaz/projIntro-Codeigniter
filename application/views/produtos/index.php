    <div class="container">

        <?php
        if ($this->session->flashdata('success')) { ?>
            <p class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </p>
        <?php
        } else if ($this->session->flashdata('danger')) { ?>
            <p class="alert alert-danger">
                <?= $this->session->flashdata('danger') ?>
            </p>
        <?php
        }

        if ($this->session->userdata("usuario_logado")) {

        ?>

            <h1>Produtos</h1>
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
                <?php
                foreach ($produtos as $produto) { ?>
                    <tr>
                        <td><?= anchor("produtos/detalhe?id={$produto['id']}", $produto['nome']) ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td><?= reais($produto['preco']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <?= anchor("login/logout", "Sair", array("class" => "btn btn-primary")); ?>

            <?= anchor("produtos/formulario", "Novo Produto", array("class" => "btn btn-primary")); ?>

        <?php
        } else { ?>

            <h1>Login</h1>

            <?php
            echo form_open(action: 'login/autenticar');

            echo form_label(label_text: "Email", id: "email");
            echo form_input(array(
                "name" => "email",
                "id" => "email",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label(label_text: "Senha", id: "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Login"
            ));
            echo form_close()
            ?>


            <h1>Cadastro</h1>

        <?php
            echo form_open(action: 'usuarios/novo');
            echo form_label(label_text: "Nome", id: "nome");
            echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label(label_text: "Email", id: "email");
            echo form_input(array(
                "name" => "email",
                "id" => "email",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label(label_text: "Senha", id: "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Cadastrar"
            ));

            echo form_close();
        }
        ?>
    </div>