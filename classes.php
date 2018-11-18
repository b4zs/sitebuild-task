<?php

trait Singleton
{
    private static $instance;

    public static function getInstance()
    {
        return static::$instance ? static::$instance : (static::$instance = new static());
    }
}

class LoginForm
{
    use Singleton;

    private $checkboxes;
    private $errorMessages;
    private $users;

    public function __construct()
    {
        $config = include 'config.php';

        $this->errorMessages = $config['error_messages'];
        $this->checkboxes = $config['checkboxes'];
        $this->users = $config['users'];
    }

    public function getCheckboxes()
    {
        return $this->checkboxes;
    }

    public function getErrorForField($field)
    {
        if (!$this->isSubmitted()) {
            return null;
        }

        $errors = $this->validate();

        return isset($errors[$field]) ? $errors[$field] : null;
    }

    public function getErrors()
    {
        if (!$this->isSubmitted()) {
            return null;
        }

        return $this->validate();
    }

    public function isSubmitted()
    {
        $data = array_filter($this->getSubmittedData());
        return !empty($data);
    }

    public function isValid()
    {
        return 0 === count($this->validate());
    }

    private function validate()
    {
        $data = $this->getSubmittedData();

        $errors = [];

        if (!$data['email']) {
            $errors['email'] = $this->errorMessages['required'];
        }
        if (!$data['password']) {
            $errors['password'] = $this->errorMessages['required'];
        }

        foreach ($this->getCheckboxes() as $checkbox) {
            $value = $this->getSubmittedValue($checkbox['id']);
            if (!$value) {
                $errors[$checkbox['id']] = $this->errorMessages['required'];
            }
        }

        if (empty($errors)) {
            $currentUser = $this->findUser($data['email'], $data['password']);

            if (null === $currentUser) {
                $errors['password'] = $this->errorMessages['invalid_email_or_password'];
            }
        }

        return $errors;
    }

    public function authenticate()
    {
        $data = $this->getSubmittedData();

        return $this->findUser($data['email'], $data['password']);
    }

    private function findUser($email, $password)
    {
        $currentUser = null;
        foreach ($this->users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                $currentUser = $user;
            }
        }
        return $currentUser;
    }

    public function getSubmittedData()
    {
        $data = array(
            'email' => $this->getSubmittedValue('email'),
            'password' => $this->getSubmittedValue('password'),
        );

        foreach ($this->getCheckboxes() as $checkbox) {
            $data[$checkbox['id']] = $this->getSubmittedValue($checkbox['id']);
        }

        return $data;
    }

    public function getSubmittedValue($field)
    {
        return isset($_POST[$field]) ? $_POST[$field] : null;
    }
}

class Contents
{
    use Singleton;

    public function getContent($identifier)
    {
        $config = include 'config.php';
        return isset($config['contents'][$identifier]) ? $config['contents'][$identifier] : null;
    }
}

class View
{
    use Singleton;

    public function render($template, array $variables = [])
    {
        extract($variables);
        $view = $this;
        include 'templates/' . $template . '.php';
    }
}

class App
{
    use Singleton;

    public function route($route)
    {
        session_start();

        switch ($route) {
            case 'index':
            case 'login':
                if (isset($_SESSION['user'])) {
                    return $this->redirect('./profile');
                }

                $loginForm = LoginForm::getInstance();
                if ($loginForm->isValid()) {
                    $_SESSION['user'] = $loginForm->authenticate();

                    return $this->redirect('./profile');
                }

                echo View::getInstance()->render('index', [
                    'form' => $loginForm,
                    'sidebarContent' => Contents::getInstance()->getContent('sidebar'),
                    'loginContent' => Contents::getInstance()->getContent('login'),
                ]);
                return;
            case 'logout':
                unset($_SESSION['user']);
                return $this->redirect('./login');
            case 'profile':
                $user = $_SESSION['user'];
                if (empty($user)) {
                    return $this->redirect('./login');
                }
                echo View::getInstance()->render('profile', ['user' => $user,]);
                return;
            default:
                echo View::getInstance()->render('404');
                return;
        }
    }

    private function redirect($url)
    {
        header('Location: ' . $url, 301);
        return '';
    }
}
