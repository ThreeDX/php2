<?php
include 'app/autoload.php';
Core::instance()->Call(isset($_GET['page']) ? $_GET['page'] : 'Index' , $_REQUEST);
