<?php


class cadastraFormularioModel
{

    private $conexaoBDO;

    public function __construct($conexao)
    {
        $this->conexaoBDO = $conexao;
    }


    public function insereFormulario(cadastroModel $c)
    {

        //antes de inserir no banco de dados preciso verificar se o e-mail já existe
        //se existir não posso deixar cadastrar novamente
        //chamar a função para verifiar se o e_email existe
        $verificaEmail = $this->verificaEmail($c->__get('email'));

        //se o retorno for 1 significa que posso inserir, se for 0 o e-mail já tem no bdo
        if ($verificaEmail > 0) {
            $sql = $this->conexaoBDO->prepare('INSERT INTO cadastro VALUES (:nome, :email, :telefone, :senha)');
            $sql->bindValue(':nome', $c->__get('nome'));
            $sql->bindValue(':email', $c->__get('email'));
            $sql->bindValue(':telefone', $c->__get('telefone'));
            $sql->bindValue(':senha', $c->__get('senha'));
            $sql->execute();
            unset($conexaoBDO);

            echo "Dados cadastrados com sucesso";
            header('location:index.php?c=1');
            exit();
        } else {
            echo "Esse e-mail já foi cadastrado";
            header('location:cadastro.php?c=2');
            exit();
        }


        /*
        
        $retorno = $sql->execute();
       


        // echo "O valor do retorno é " . $retorno . "<br>";
        if ($retorno > 0) {
            echo "Dados inseridos com sucesso no BDO <br>";
        } else {
            echo "Não foi possivel inserir no BDO <br>";
        }

        echo "nome passado é o  " . $c->__get('nome');
        echo "<pre>";
        print_r($c);
        echo "</pre>";
        */
    }


    public function verificaEmail($email)
    {
        // $sql = $this->conexaoBDO->prepare('SELECT * FROM cadastro WHERE email = :email');
        $sql = $this->conexaoBDO->prepare('SELECT * FROM cadastro WHERE email = :email');
        // echo "email aqui é o " . $c->__get('email') . "<br>"; 
        // $sql->bindValue(':email', $c->__get('email'));
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            // $data = $sql->fetchAll();
            echo "Esse e-mail já existe <br>";
            return 0;
            // $u = new Usuario();
            // $u->setId($data['id']);
            // $u->setNome($data['nome']);
            // $u->setEmail($data['email']);

            // return $u;
        } else {
            echo "Não encontrou <br>";
            return 1;
        }


        // echo "<pre>";
        // print_r($retorno);
        // echo "</pre>";
    }
}
