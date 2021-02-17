<?php

require_once("models/persons_model.php");
$per = new persons_model();
$data = $per->get_persons();

require_once("views/persons_view.php");