<?php
class utilitarios
{
	public function data($data)
	{
		return date("d/m/Y", strtotime($data));
	}
}
