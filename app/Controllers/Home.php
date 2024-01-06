<?php

namespace App\Controllers;

use App\Models\MainModel;


class Home extends BaseController
{
	protected $objSession;
	protected $objMainModel;
	protected $objRequest;

	public function __construct()
	{
		//SESSION
		$this->objSession = session();
		$this->objMainModel = new MainModel;

		$this->objRequest = \Config\Services::request();
	}

	public function create()
	{
		$data['page'] = 'home/create';
		return view('home/header', $data);
	}

	public function uploadRegalo()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');

		$data['name'] = $this->objRequest->getPost('name');
		$data['link'] = $this->objSession->get('user')['link'];

		return json_encode($this->objMainModel->objCreate('regalos', $data));
	}

	public function uploadPhoto()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');

		$file = $_FILES['file'];
		$id = $this->objRequest->getPost('id');

		return json_encode($this->objMainModel->uploadFile('regalos', $id, 'image', $file));
	}

	public function userGive()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');
		$data = array();
		$data['uniqid'] = uniqid();
		$data['regalos'] = $this->objMainModel->objData('regalos', 'link', $this->objSession->get('user')['link'], 'obtain', '0');
		$data['user'] = $this->objSession->get('user');
		$data['page'] = 'home/userGive';
		return view('home/header', $data);
	}

	public function getRegalos()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');

		$data['regalos'] = $this->objMainModel->objData('regalos', 'link', $this->objSession->get('user')['link'], 'obtain', '0');
		return view('home/regalos', $data);
	}


	public function modalCreate()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');

		$data['uniqid'] = uniqid();

		return view('modal/createRegalo', $data);
	}

	public function userObtain()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');
		$data = array();

		$link = $this->objSession->get('user')['link'];
		$data['uniqid'] = uniqid();
		$data['regalos'] = $this->objMainModel->objData('regalos', 'link', $link, 'obtain', '0');
		$data['page'] = 'home/userObtain';
		return view('home/header', $data);
	}

	public function deleteAllRegalos()
	{
		# Verify Session 
		if (empty($this->objSession->get('user')) || empty($this->objSession->get('user')['link']))
			return view('logout');

		return json_encode($this->objMainModel->deleteRegalos($this->objSession->get('user')['link']));
	}
}
