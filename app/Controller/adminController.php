<?php
// app/controllers/AdminController.php
include 'Controller.php';

class AdminController extends Controller {
    public function index() {
        // Logic for admin index page
        $this->loadView('/index');
    }
}
