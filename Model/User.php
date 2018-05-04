<?php
require_once("DB.php");

class User extends DB
{
    public function add_user($post)
    {
        $this->query("SELECT COUNT(mail) AS nb_mail FROM user WHERE mail = :mail");
        $this->bind(':mail', $post['mail']);
        $this->execute();
        $result= $this->fetch();
        if ($result['nb_mail'] != '0')
        {
            echo "Email déjà enregistré! Veuillez en choisir un autre ";
            exit();
        }
        $options = [ 'salt' => "si t'aimes la wac tape dans tes mains" ];
        $this->query("INSERT INTO user(fullName, displayName, mail, password) VALUES (:fullName, :displayName, :mail, :password)");
        $this->bind(':fullName', $post['fullName']);
        $this->bind(':displayName', $post['displayName']);
        $this->bind(':mail', $post['mail']);
        $this->bind(':password', hash('ripemd160', $post['password'].$options['salt']));
        $this->execute();
        

    }

    public function user_connection($post)
    {
        $options = [ 'salt' => "si t'aimes la wac tape dans tes mains" ];
        $this->query("SELECT COUNT(idUser), password, displayName FROM user WHERE mail = :mail AND password = :password");
        $this->bind(':mail', $post['mail']);
        $this->bind(':password', hash('ripemd160', $post['password'].$options['salt']));
    
        $result = $this->fetch();

        if ($result != null)
        {
            if ($result['password'] != hash('ripemd160',$post['password'].$options['salt']))
            {
                echo "Mot de passe incorrect";
                exit();
            } 
        }  
        else 
        {
            $this->execute();

        }
    }

	public function getInfos($mail){
		$this->query("SELECT * FROM user WHERE mail = :mail");
		$this->bind(':mail', $mail);
		$this->execute();
		$result = $this->fetch();
		$_SESSION['idUser'] = $result['idUser'];
		$_SESSION['fullName'] = $result['fullName'];
		$_SESSION['displayName'] = $result['displayName'];
		$_SESSION['mail'] = $result['mail'];
		$_SESSION['theme'] = $result['theme'];
		$_SESSION['registrationDate'] = $result['registrationDate'];
		$_SESSION['password'] = $result['password'];
        // $_SESSION['idUrlAvatar'] = $result['idUrlAvatar'];
	}
}
