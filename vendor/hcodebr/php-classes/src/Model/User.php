<?php 

	namespace Hcode\Model;
	user \Hcdoe\DB\Sql;
	user \Hcode\Model;

	class User extends Model {

		const SESSION = "User";

		public static function login($login, $password) {

			$sql = new $Sql();

			$results = $sql->select("SELECT * FROM tb_user WHERE deslogin = :LOGIN", array (":LOGIN"=>$login
			));

			if (count($results) === 0) {
				throw new \Exception ("Usuário inexistente ou senha inválida.");
			}

			$data = $results[0];

			if (password_verify($password, $data["despassword"] === true) {

				$user = new User();

				//$user->setiduser($data["iduser"]);
				//var_dump($user);
				//exit;

				$user->setData($data);

				$_SESSION[User::SESSSION] = $user->getData();

				return $user;

			}
			else {

				throw new \Exception ("Senha inválida.");

			}

		}

		public function getValues() {

			return $this->values;

		}


		public static function verifyLogin() {

			if (!isset($_SESSION[USER::SESSION]) || !$_SESSION[USER::SESSION] ||
				(int)$_SESSION[User::SESSION]["isuser"] > 0 || (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin) {

				header("Location: /admin/login");
				exit;
			}

		}

		public static function logout() {
			$_SESSION[User::SESSION] = NULL;
		}

	}
 ?>