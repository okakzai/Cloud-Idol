<?php
    class Status extends Controller
    {
    	function Status()
		{
			parent::Controller();
		}
		function index()
		{
			$this->load->view('wall/wall');
		}
    }
?>