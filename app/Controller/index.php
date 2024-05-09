<?php
include './app/View/header.php';
if (isset($_GET['page']) && ($_GET['page'] != "")) {
    switch ($_GET['page']) {
        case 'order':
            include './app/View/order.php';
            break;
        case 'service':
            include './app/View/service.php';
            break;
        case 'doctor':
            include './app/View/doctor.php';
            break;
        case 'service1':
            include './app/View/service1.php';
            break;
        case 'tintuc':
            include './app/View/tintuc.php';
            break;
        case 'sukien':
            include './app/View/sukien.php';
            break;
        case 'hoptac':
            include './app/View/hoptac.php';
            break;
        case 'uudai':
            include './app/View/uudaiView.php';
            break;
        case 'dathen':
            include './app/Model/AddModel.php';
            $Add = new Add();
            $Add->themOrder();
            include './app/View/order.php';
            break;
          
        default:
        include './app/View/body.php';
        break;
    }
} else {
    include './app/View/body.php';
}
include './app/View/footer.php';
