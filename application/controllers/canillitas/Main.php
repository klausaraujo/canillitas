<?php
if (! defined("BASEPATH"))
    exit("No direct script access allowed");

class Main extends CI_Controller
{
	
	private $path;
	private $fil;
	private $arch;
	
    public function __construct()
    {
        parent::__construct();
		if (!$this->session->userdata("usuario"))
			header("location:" . base_url() . "login");
		
		$this->path = $_SERVER["DOCUMENT_ROOT"].'/canillitas/';
		#$this->fil = file($_SERVER["DOCUMENT_ROOT"].'/canillitas/.env');//devuelve un array con el contenido del archivo*/
		$this->fil = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/canillitas/.env', false);//devuelve un string con el contemido del archivo
		$this->arch = file_put_contents($_SERVER["DOCUMENT_ROOT"].'/canillitas/public/template/images/canillitas/doc3.txt','Nuevo archivo de texto',LOCK_EX);
    }

    public function index()
    {
		 
    }
	public function canillitas()
    {
		$this->load->model("canillitas/Canillita_model");
		$listaCanillitas = $this->Canillita_model->listar();
		
		if ($listaCanillitas->num_rows() > 0) {
            $listaCanillitas = $listaCanillitas->result();
        } else {
            $listaCanillitas = array();
        }		
		
		$data = array(
			"formNew" => $this->load->view('canillitas/form-new', NULL, TRUE),
			"listarCanillita" => json_encode($listaCanillitas),
			"arch" => json_encode($this->fil),
			"crea" => $this->arch
			//"ruta" => '../'
		);
		#$data['formNew'] = $this->load->view('canillitas/form-new', NULL, TRUE);
		$this->load->view($this->uri->segment(1).'/main',$data);
    }
	
	public function listar(){
		$this->load->model("canillitas/Canillita_model");
		$listaCanillitas = $this->Canillita_model->listar();		
		
		if ($listaCanillitas->num_rows() > 0) {
            $listaCanillitas = $listaCanillitas->result();
        } else {
            $listaCanillitas = array();
        }

        $data = array(
            "status" => 200,
            "data" => array(
						"listarCanillita" => $listaCanillitas
					)
        );

        echo json_encode($data);
	}
	
	public function registrar()
    {
		$this->load->model("canillitas/Canillita_model");
		$dtz = new DateTimeZone("America/Lima");
        $dt = new DateTime("now", $dtz);
        $fechaActual = $dt->format("Y-m-d h:i:s a");
		
		$verif_foto = 1;
        $foto = $_FILES["file"];
        $verif_foto = (filesize($foto["tmp_name"]) > 0) ? 2 : 1;
		
		/*$fechanac = strtotime($this->input->post("fechaNac"));
		$fechanac = date('Y-m-d H:i:s');*/
		
		$dni = $this->input->post("documento_numero");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$fechanac = $this->input->post("fechaNac");
		$genero = $this->input->post("genero");
		$edocivil = $this->input->post("edoCivil");
		$condicion = $this->input->post("condic");
		$domic = $this->input->post("domicilio");
		$telf = $this->input->post("tlf1");
		$telf2 = $this->input->post("tlf2");
		$email = $this->input->post("correo");
		$obs = $this->input->post("observacion");
		$foto_str = $this->input->post('foto_dni_str');
		
		$this->Canillita_model->setDocumento_numero($dni);
		$this->Canillita_model->setNombres($nombres);
		$this->Canillita_model->setApellidos($apellidos);		
		$this->Canillita_model->setFecha_nacimiento($fechanac);
		$this->Canillita_model->setGenero($genero);
		$this->Canillita_model->setEstado_civil($edocivil);
		$this->Canillita_model->setCondicion($condicion);
		$this->Canillita_model->setDomicilio($domic);
		$this->Canillita_model->setTelefono_01($telf);
		$this->Canillita_model->setTelefono_02($telf2);
		$this->Canillita_model->setEmail($email);
		$this->Canillita_model->setObs($obs);
		$this->Canillita_model->setUsuario_registro($this->session->userdata("idusuario"));
		$this->Canillita_model->setFecha_registro($fechaActual);
		
		
		
		$campos = array(
			'dni ' =>  $this->input->post("documento_numero"),
			'nombres ' =>  $this->input->post("nombres"),
			'apellidos ' =>  $this->input->post("apellidos"),
			'fechanac ' =>  $fechanac,
			'genero ' =>  $this->input->post("genero"),
			'edocivil ' =>  $this->input->post("edoCivil"),
			'condicion ' =>  $this->input->post("condic"),
			'domic ' =>  $this->input->post("domicilio"),
			'telf ' =>  $this->input->post("tlf1"),
			'telf2 ' =>  $this->input->post("tlf2"),
			'email ' =>  $this->input->post("correo"),
			'obs ' =>  $this->input->post("observacion"),
			'usuario' => $this->session->userdata("idusuario"),
		);
		
		$count = $this->Canillita_model->existe_canillita();
		
		
		if (strlen($apellidos) < 1 or strlen($nombres) < 1 or strlen($dni) < 1 or strlen($genero) < 1 or strlen($fechanac) < 1)
        {
            $data = array(
                "status" => 500,
				"campos" => $campos
            );
        }else{
			if ($count > 0)
            {
                $data = array(
                    "status" => 201,
					"campos" => $campos
                );
            }else{
				$id = $this->Canillita_model->registrar();
				$resp_foto = '';
				
				if ($id > 0){
					if ($verif_foto == 1)
                    {
                        $filename_foto = $this->agregarFoto($foto_str);
                        $this->Canillita_model->setId($id);
                        $this->Canillita_model->setFoto($filename_foto);
                        $resp_foto = $this->Canillita_model->agregarFoto();
                    }else{
						$filename_foto = $this->agregarFoto1($foto);
						if ($filename_foto["estado"] == 0){
							$this->Canillita_model->setId($id);
							$this->Canillita_model->setFoto($filename_foto["foto"]);
							$resp_foto = $this->Canillita_model->agregarFoto();
						}else{
							$resp_foto = 'Error con la foto';
						}
					}					
					$data = array(
						"status" => 200,
						"campos" => $campos,
						"imagen" => $resp_foto,
						"nombreImg" => $filename_foto
					);
				}else{
					$data = array(
                        "status" => 500
                    );
                }
			}
		}
		echo json_encode($data);
		//$this->load->view($this->uri->segment(1).'/form-new');
    }
	
	public function agregarFoto($foto_str)
    {
        $image = base64_decode($foto_str);
        $image_name = date("Ymdhis");
        $filename = $image_name . '.' . 'jpg';
        //$path = getenv('PATH_IMG_BRIGADISTA');
		$ubic = $this->path .'public/template/images/canillitas/';
        file_put_contents($ubic . $filename, $image);
		return $filename;
    }
	
	public function agregarFoto1($foto)
    {
        $ubic = $this->path .'public/template/images/canillitas/';
        $estado = 0;
        $imagen = "";

        if (filesize($foto["tmp_name"]) > 0)
        {

            if ($foto["type"] == "image/jpeg" || $foto["type"] == "image/jpg" || $foto["type"] == "image/png" || $foto["type"] == "image/svg")
            {

                $name = date("Ymdhis");

                $data = $foto['name'];
                $ext = pathinfo($data, PATHINFO_EXTENSION);
                $imagen = $name . '.' . $ext;
                redim($foto["tmp_name"], $ubic . $name . '.' . $ext, 375, 508);

            }
            else
            {
                $estado = - 3;
                $message = "Error con la imagen";
            }
        }
        else
        {
            $estado = - 1;
        }

        return array(
            "estado" => $estado,
            "foto" => $imagen
        );
    }
}