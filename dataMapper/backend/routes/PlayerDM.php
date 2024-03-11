<?php

namespace routes;

class PlayerDM
{
    public $id;
    public $nome;
    public $email;
    private $senha;
    public $data_cadastro;

    public function __construct($id, $nome, $email, $senha, $data_cadastro)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->data_cadastro = $data_cadastro;
    }

    function toHtmlRow()
    {
        return "<tr>
            <td>$this->id</td>
            <td>$this->nome</td>
            <td>$this->email</td>
            <td>$this->data_cadastro</td>
            <td><a href='/dataMapper/backend/routes/alterPlayerForm.php/?id=$this->id'> - </a></td>
            <td><a href='/dataMapper/backend/routes/deletePlayerForm.php/?id=$this->id'><0></a></td>
        </tr>";
    }
}
