<?php 

	//session_star();
	require_once("vendor/autoload.php");

	use \Slim\Slim;
	use \Hcode\Page;
	//use \Hcode\PageAdmin;
	//use \Hcde\Model\User;

	$app = new Slim();

	$app->config('debug', true);


	$app->get('/', function() {

		
		//$sql = new \Hcode\DB\Sql();
		//$results = $sql->select("SELECT * FROM tb_users");
		//echo json_encode($results);
		
		//echo "OK";


		$page = new Page();

		$page->setTpl("index");

	});

/*
	$app->get('admin', function() {

		User::verifyLogin();

		$page = new PageAdmin();

		$page->setTpl("index");

	});

	$app->get('/admin/login', function() {

		$page = new PagAdmin([
			"header"=>false,
			"footer"=>false
		]);

		$page->setTpl("login");

	});

	$app->get('/admin/login', function() {

		User::login($_POST["login"], $_POST["password"]);
		header("Location: /admin");
		exit;

	});



	$app->get('/admin/logout', function() {

		User::logout();

		header("Location: /admin/login");

		exit;

	});
*/
	$app->run();

 ?>