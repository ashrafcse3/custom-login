<?php

  class UserController extends maincontroller {
    
    function __construct(){
      parent::__construct();
    }

    public function login() {
      $user_table = 'users';

      // load the UserModel
      $userModel = $this->load->model('UserModel');

      // catch all of the information that are submitted from signup page
		  $email = isset($_POST["email"])? $_POST["email"]: NULL;
		  $password = isset($_POST["password"])? $_POST["password"]:  NULL;
      
      // store all information in one array
      $data  = array(
        'email' => $email,
        'password' => $password
      );
      //print_r($data);

      $cond = "email='$email' and password='$password'";

      $result = $userModel->getUserData($user_table, $cond);
      //var_dump($result);
      if (empty($result)) {
        header('Location: ' . BASE_URL . '/IndexController/login');
      exit();
      }
      $_SESSION['ownUserData'] = $result;
      header('Location: ' . BASE_URL . '/UserController/profile');
      exit();
    }

    public function loginWithFB() {
      
      try {
        global $helper;
        $accessToken = $helper->getAccessToken();
      } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo  'Graph returned an error: ' . $e->getMessage();
      } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
      }
      
      if(!$accessToken) {
        header('location: ' . BASE_URL . '/IndexController/login');
      }

      global $fb;
      $oAuth2Client = $fb->getOAuth2Client();
      if (!$accessToken->isLongLived()) {
        $accessToken = $oAuth2Client->getLongLivedAccessToken       ($accessToken);
      }

      $response = $fb->get("/me?fields= id, name, email, picture.type(large)", $accessToken);
      $userData = $response->getGraphNode()->asArray();

      $_SESSION['userData'] = $userData;
      $_SESSION['access_token'] = (string) $accessToken;

      //var_dump($userData);

      header('Location: ' . BASE_URL . '/UserController/profile');
      exit();
    }

    public function signup() {
      $user_table = 'users';
      $min=5;
		  $max=30;

      // load the UserModel
      $userModel = $this->load->model('UserModel');

      // catch all of the information that are submitted from signup page
      $name = isset($_POST["name"])? $_POST["name"]: NULL;
		  $email = isset($_POST["email"])? $_POST["email"]: NULL;
		  $password = isset($_POST["password"])? $_POST["password"]:  NULL;
		  $confirm_password = isset($_POST["confirm_password"])? $_POST["confirm_password"]  : NULL;
      
      // store all information in one array
      $data  = array(
        'name' => $name,
        'email' => $email,
        'password' => $password
      );
      print_r($data);
      $result = $userModel->insert($user_table, $data);

      if ($result == 1) {
        echo '<br>';
        echo 'You are registered, now you can login';
      } else {
        echo '<br>';
        echo 'You are not registered';
      }
    }

    public function profile() {
      $this->load->view('user/profile');
    }
  }