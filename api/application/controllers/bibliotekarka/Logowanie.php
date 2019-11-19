<?ph
defined('BASEPATH') OR exit('No direct script access allowed');

class Logowanie extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();
		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		//$this ->load->model('bibliotekarka/Logowanie_model');
		

	}


public function dziala()
{

}


	public function zaloguj()
	{
		
		$login = $this ->input -> post('login');
		$haslo = $this ->input -> post('haslo');
		$haslo = crypt($haslo, config_item('encryption_key'));

		$login = $this->Logowanie_model->zaloguj($login, $haslo);

		if( !$login )
		{
			$output['error'] = "Błędny login lub hasło";
		}
		else
		{
			$token = $this->jwt->encode( array(
					'login' => $login->login,
					'haslo' => $login->haslo,
					'rola'  => $login->rola
				), config_item('encryption_key'));

			$output['token'] = $token;
		}

		echo json_encode($output);

	}	

	

	






	

}