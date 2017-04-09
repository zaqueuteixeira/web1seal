<?php
require_once './cadastrar.class.php';;
/*
 * CLasse responsavel por tudo sobre o login
 */

class Login {

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * @return boolean true caso consiga cadastrar e false em caso de eventuais erros.
     * @param string $data data da tentativa de login ex: 05/09/2017  
     * @param string $user_id id do usuario a qual tentou logar  
     */
    public function registrarTentativaLogin($data, $user_id) {
        $sql = "INSERT INTO tentativas_login values($data,$user_id)";
        $teste = $mysqli->query($sql) or die(mysqli_errno($mysqli));
        
        if($mysqli->affected_rows > 0){
            return TRUE;
        }else{
            return false;
        }
    }

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * @return o id do usuario
     * @param string $data data da tentativa de login ex: 05/09/2017  
     * @param string $user_id id do usuario a qual tentou logar  
     */
    public function retornarID($matricula) {
        
    }

}
