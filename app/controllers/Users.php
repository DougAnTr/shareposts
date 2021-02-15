<?php

use App\Core\Controller;
use App\Core\Form_validation;

class Users extends Controller
{

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            $validation = new Form_validation();

            $validation->validate($data, [
                'email' => 'required',
                'name' => 'required', 
                'password' => 'required|minLenght[6]',
                'confirm_password' => "required|matches[password.{$data['password']}]"
            ]);

            echo $validation->getErrors();

        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }
}