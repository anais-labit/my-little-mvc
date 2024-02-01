<?php

namespace App\Controller;

use App\Model\User;

class AuthenticationController
{

    function emailExists(string $email): bool
    {
        $email = trim(htmlspecialchars($_POST['email']));

        $userModel = new User();
        if ($userModel->findOneByEmail($email)) {
            return true;
        }
        return false;
    }

    function passwordValidation(string $password): bool
    {
        return (strlen($password) >= 8) &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[0-9]/', $password) &&
            preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password);
    }

    function emailValidation(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    public function register(): bool
    {
        $login = trim(htmlspecialchars($_POST['login']));
        $fullname = trim(htmlspecialchars($_POST['fullname']));
        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['password']));
        $passwordCheck = trim(htmlspecialchars($_POST['password-check']));
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new User();
        $userModel->setLogin($login)->setFullname($fullname)->setEmail($email)->setPassword($hashedPassword);

        if (empty($login) || empty($fullname) || empty($password) || empty($passwordCheck)) {
            echo json_encode([
                "success" => false,
                "message" => "Tous les champs doivent être remplis."
            ]);
            return false;
        }
        if (isset($login) && isset($fullname) && isset($email) && isset($password) && isset($passwordCheck) && (!$this->emailExists($email))) {
            if (($password === $passwordCheck) && ($this->passwordValidation($password)) && ($this->emailValidation($email))) {
                $userModel->create($login, $fullname, $email, $hashedPassword);
                echo json_encode([
                    "success" => true,
                    "message" => "Inscription réussie. Vous allez être redirigé(e)."
                ]);
                header('Location: login.php');
                return true;
            } else if (!$this->passwordValidation($password)) {
                echo json_encode([
                    "success" => false,
                    "message" => "Le mot de passe doit contenir au minimum huit caractères, une majuscule, un chiffre et un caractère spécial."
                ]);
                return false;
            } else if (!$this->emailValidation($email)) {
                echo json_encode([
                    "success" => false,
                    "message" => "Le format de l'email n'est pas valide."
                ]);
                return false;
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "Les mots de passe ne correspondent pas."
                ]);
                return false;
            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Cet email est déjà utilisé."
            ]);
            return false;
        }
    }

    public function login(): bool
    {
        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['password']));
        $userModel = new User();
        $infoUser = $userModel->findOneByEmail($email);
        $hashedPassword = $infoUser->getPassword();

        if (($userModel->findOneByEmail($email)) && (password_verify($password, $hashedPassword))) {
            echo password_verify($password, $hashedPassword);
            $_SESSION['user'] = $infoUser;
            var_dump($_SESSION['user']);
            header('Location: shop.php');
            return true;
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Informations d'identification incorrectes"
            ]);
            return false;
        }
    }

    public function profile()  {

        if ($_SESSION) {
            return true;
        } return false;

        
    }
}
