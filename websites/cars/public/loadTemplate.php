<?php
function loadTemplate($fileName) {
        ob_start();
        require $fileName;
        $buffer = ob_get_clean();
        return $buffer;       
}