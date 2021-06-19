<?php

namespace App\Controllers;

use App\Controller;

class InventoryController extends Controller
{
	public function index(): void
	{
		$this->render('listagem');
	}
}