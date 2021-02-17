<?php
// http://www.w3programmers.com/crud-with-php-oop-and-mvc-design-pattern/
// https://github.com/keefekwan/php_crud_mvc_oop

require_once 'controller/ContactsController.php';

$controller = new ContactsController();

$controller->handleRequest();

