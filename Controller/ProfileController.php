<?php
require_once('Controller/Controller.php');
require_once('Model/Profile.php');
require_once ('Model/User.php');

class ProfileController extends Controller {

	public function index(){
		return $this->view('profile', [
			'fullName' => $_SESSION['fullName'],
			'displayName' => $_SESSION['displayName'],
			'mail' => $_SESSION['mail'],
			'theme' => $_SESSION['theme'],
			'registrationDate' => $_SESSION['registrationDate'],
            // 'idUrlAvatar' => $_SESSION['idUrlAvatar'],
        ]);
	}
    public function updatemail($updatemail, $mail){
        $profile = new Profile();
        $profile->updatemail($updatemail, $mail);
    }
    public function updatepassword($updatepassword, $mail){
        $profile = new Profile();
        $profile->updatepassword($updatepassword, $mail);
    }
    // public function addAvatar($avatar, $mail){
    //     $profile = new Profile();
    //     $profile->addAvatar($avatar, $mail);
    // }

}

$profileController = new ProfileController();
$profile = new Profile();
$user = new User();
// if(isset($_POST['upload'])){
//     $profileController->addAvatar($_FILES['avatar'], $_SESSION['mail']);
//         $user->getInfos($_SESSION['mail']);
//     }


/*if (isset($_POST['avatar'])) { 
    
    
} else{
   echo "La photo n'as pas pu être téléchargée !";
}
*/
/*if(isset($_POST['submit'])){
    $file = $_FILES['avatar'];
    $fileName = $_FILES['avatar']['name'];
}*/
/*if(isset($_FILES['avatar']) AND !empty($_FILES['avatar'])){
    $tailleMax = 2097152;
    $extensionValides = array('jpg', 'jpeg', 'gif', 'png');
    if ($_FILES['avatar']['size'] <= $tailleMax){
       $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        $profileController->addAvatar($_POST['avatar'], $_SESSION['mail']);
        $user->getInfos($_SESSION['mail']);
   }
}
var_dump($_POST['avatar']);*/
if (isset($_POST['updatemail'])) {
    if (!empty($_POST['updatemail'])) {
        if (filter_var($_POST['updatemail'], FILTER_VALIDATE_EMAIL)) {
            if ($profile->checkmail($_POST['updatemail']) == true) {
                $profileController->updatemail($_POST['updatemail'], $_SESSION['mail']);
                $user->getInfos($_POST['updatemail']);
            }
        }
        else{
            echo "Email incorrect!";
            return false;
        }
    }else{
        echo "Veuillez rentrer une adresse mail";
        return false;
    }
}

if (isset($_POST['old_pass']) && isset($_POST['new_pass']) && isset($_POST['confirm_pass'])) {
    if (!empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass'])) {
        $options = ['salt' => "si t'aimes la wac tape dans tes mains"];
        if (hash('ripemd160', $_POST['old_pass'].$options['salt']) == $_SESSION['password']) {
            if ($_POST['new_pass'] == $_POST['confirm_pass']) {

                $_POST['new_pass'] = hash('ripemd160', $_POST['new_pass'].$options['salt']);
                $profileController->updatepassword($_POST['new_pass'], $_SESSION['mail']);
                $user->getInfos($_SESSION['mail']);
            }
            else{
                echo "les deux mot de passe ne correspondent pas !!!";
                return false;
            }
        }
        else{
            echo "Vous avez mis un mauvais mot de passe";
            return false;
        }
        
    }
    else{
        echo "Veuillez rentrer un mot de passe";
        return false;
    }
}

$profileController->index();
?>