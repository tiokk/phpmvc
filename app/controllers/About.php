<?php

class About extends Controller{
    public function index(){
        $this->view('template/header');
        $this->view('about/index');
        $this->view('template/footer');
    }
    public function contact(){
		$this->view('template/header');
        $this->view('about/contact');
        $this->view('template/footer');
    }
}