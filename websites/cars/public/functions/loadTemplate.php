<?php
function loadTemplate($fileName) {
	   extract($templateVars);
        ob_start();
        require $fileName;
        $buffer = ob_get_clean();
        return $buffer;       
}