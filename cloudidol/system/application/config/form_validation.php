<?php
$config=array
(
	array
	(
		'field'=>'nama_depan',
		'label'=>'Nama Depan',
		'rules'=>'required|min_length[4]|max_length[30]|alpha'
	),
	array
	(
		'field'=>'nama_belakang',
		'label'=>'Nama Belakang',
		'rules'=>'required|min_length[4]|max_length[30]|alpha'
	),
	array
	(
		'field'=>'email',
		'label'=>'Email',
		'rules'=>'required|valid_email'
	),
	array
	(
		'field'=>'konfirmasi_email',
		'label'=>'Konfirmasi Email',
		'rules'=>'required|matches[email]'
	),
	array
	(
		'field'=>'tanggal',
		'label'=>'Tanggal Lahir',
		'rules'=>'required'
	),
	array
	(
		'field'=>'username',
		'label'=>'Username',
		'rules'=>'required|exact_length[6]|alpha'
	),
	array
	(
		'field'=>'password',
		'label'=>'Password',
		'rules'=>'required|exact_length[6]'
	),
	array
	(
		'field'=>'konfirmasi_password',
		'label'=>'Konfirmasi Password',
		'rules'=>'required|matches[password]'
	)
);
?>