<?php
// Các hàm tiện ích viết chung của controller
class Controller
{
    protected function loadView($viewName, $data = [])
    {
        // Load the view
        include_once '../../admin/'.$viewName.''.'.php';
    }
}
