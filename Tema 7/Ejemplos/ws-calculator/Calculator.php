<?php
class Calculator{
  
    public function Add($params) {
        return array("AddResult" => $params->intA + $params->intB);
    }

    public function Subtract($params) {
        return array("SubtractResult" => $params->intA - $params->intB);
    }

    public function Multiply($params) {
        return array("MultiplyResult" => $params->intA * $params->intB);
    }

    public function Divide($params) {
        return array("DivideResult" => $params->intA / $params->intB);
    }
}

