<?php

namespace App\Controllers;

use App\Database;
use App\Models\User;

/**
 * Class AuthController
 * Handles user authentication including registration, login, and logout.
 */
class AuthController
{
    /**
     * @var User The user model instance.
     */
    private User $user;

    /**
     * AuthController constructor.
     * Starts a new session and initializes the user model.
     */
    public function __construct()
    {
        session_start();
        $db = new Database();
        $this->user = new User($db);
    }

    /**
     * Handles user registration.
     * If the request method is POST, it processes the registration form.
     * Otherwise, it displays the registration form.
     */
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleRegisterPost();
        } else {
            require __DIR__ . '/../../templates/register.php';
        }
    }

    /**
     * Processes the registration form.
     * Validates the input and creates a new user if validation passes.
     */
    private function handleRegisterPost(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo "Both fields are required. Please try again. <a href='/pwd/public/register'>Register here</a>";
            return;
        }

        if ($this->user->findByUsername($username)) {
            echo "User already exists. Please try again. <a href='/pwd/public/register'>Register here</a>";
            return;
        }

        $this->user->create($username, $password);
        echo "User registered successfully. <a href='/pwd/public/login'>Login here</a>";
    }

    /**
     * Handles user login.
     * If the request method is POST, it processes the login form.
     * Otherwise, it displays the login form.
     */
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleLoginPost();
        } else {
            require __DIR__ . '/../../templates/login.php';
        }
    }

    /**
     * Processes the login form.
     * Validates the input and logs in the user if validation passes.
     */
    private function handleLoginPost(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo "Both fields are required. Please try again. <a href='/pwd/public/login'>Login here</a>";
            return;
        }

        $user = $this->user->findByUsername($username);
        if (!$user || !password_verify($password, $user['password'])) {
            echo "Invalid credentials. Please try again. <a href='/pwd/public/login'>Login here</a>";
            return;
        }

        $_SESSION['user_id'] = $user['id'];
        echo "Login successful. Go to product list <a href='/pwd/public/product'>here</a> or <a href='/pwd/public/logout'>logout</a>.";
    }

    /**
     * Handles user logout.
     * Destroys the user session and redirects to the login page.
     */
    public function logout(): void
    {
        unset($_SESSION['user_id']);
        echo "You have been logged out. <a href='/pwd/public/login'>Login again</a>";
    }
}
