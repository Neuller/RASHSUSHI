<?php
class utilitarios{
// CONVERTER DATA
public function data($data) {
	return date("d/m/Y", strtotime($data));
}
}
?>