<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['url', 'form', 'session'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		//$this->session = \Config\Services::session();
	}
	public function kepsek()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM post INNER JOIN kepsek ON post.id_kepsek = kepsek.id_kepsek ORDER BY kepsek.id_kepsek DESC LIMIT 1");
		return $query->getResult();
	}
	public function menu()
	{
		$db = \Config\Database::connect();
		$queryNav = $db->query("SELECT * FROM page");
		return $queryNav->getResult();
	}
	public function subMenu()
	{
		$db = \Config\Database::connect();
		$querySub = $db->query("SELECT * FROM ((sub_menu RIGHT JOIN page ON page.id_page = sub_menu.id_page)INNER JOIN user ON page.id_user = user.id_user)");
		return $querySub->getResult();
	}
}
