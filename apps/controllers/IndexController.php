<?php

  class IndexController extends maincontroller {
    
    function __construct(){
      parent::__construct();
    }

    public function index() {
      $this->load->view('main');
    }

    public function login() {

      $this->load->view('user/login');
    }

    public function signup() {

       $this->load->view('user/signup');
    }
  }