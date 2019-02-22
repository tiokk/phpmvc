<?php
class Registration extends Controller{
    private $request;
    private $param;
    private $output=array(
						'status',
						'message',
						'data'
							);
  

    public function index(){
        $this->view('template/header');
        $this->view('registration/index');
        $this->view('template/footer');
    }
	
	public function get(){
		$this->setHeader();
		if($_SERVER['REQUEST_METHOD']== 'GET'){
			$queryAll = $this->model('Registration_model')->getAll() ;
			if(!empty($queryAll)){
				$output['status'] = 'success';
				$output['data'] = $queryAll;
			}else{
				$output['status'] = 'failed';
				$output['message'] = 'not found';
			}
		}else{
			$status= $this->setStatus();
 			$output['message'] = 'method not allowed';
		}	
		echo json_encode($output);
 	}     

	public function getOne(){
		$this->setHeader();
		if($_SERVER['REQUEST_METHOD']== 'GET'){
			$output['status'] = 'error';
			$id = $this->getparam();
			$queryOne = $this->model('Registration_model')->getById($id );
			if( $queryOne ){
				$output['status']	= 'success';
				$output['data']		= $queryOne;
			}else{
				$output['status'] = 'error';
				$output['message']= 'not found';
			}
		}else{
			$status= $this->setStatus();
			$output['status'] = 'error';
			$output['message'] = 'method not allowed';
		}
		echo json_encode($output);	
     }
	public function post(){
		$this->setHeader();
		if($_SERVER['REQUEST_METHOD']== 'POST'){
			$output['status'] = 'error';
			$data = array_map('trim',$_POST);
			$check =array_search('', $data);		 
			if($check !== false){
				$output['status'] = 'error';
				$output['message'] =$check . ' empty';
				reset($data);
			}
			if($check == false){
				$queryPost = $this->model('Registration_model')->create($data);
				if($queryPost){
					$output['status']='success';
					$output['data']=$queryPost;
				}else{
					$output['status']='error';
					$output['message'] ='failed conect with server';
				}
			}				
		}else{
			$status= $this->setStatus();
			$output['status'] = 'error';
			$output['message'] = 'method not allowed';
		}
		echo json_encode($output );

    }
	public function edit(){
		$this->setHeader();
		if($_SERVER['REQUEST_METHOD']== 'PUT'){
			 // $output['status'] = 'error';
			parse_str(file_get_contents("php://input"),$put);
			$data = array_map('trim',$put);
			$check =array_search('', $data);		 
			if($check !== false){
				$output['status'] = 'error';
				$output['message'] =$check . ' empty';
				reset($data);
			}
			if ($check == false){
				$queryPut = $this->model('Registration_model')->edit($put);
				if($queryPut > 0){
					$output['status']='success';
				}else{
					$output['status'] ='failed';
					$output['message']	= 'no data has been update';
				}
			} 
		}else{
			$status= $this->setStatus();
			$output['status'] = 'error';
			$output['message'] = 'method not allowed';
		}
		echo json_encode($output);

    }
	public function del(){
		$this->setHeader();
		if($_SERVER['REQUEST_METHOD']== 'DELETE'){
			$id = $this->getparam();
 			$queryDel = $this->model('Registration_model')->deleteId($id);
			if($queryDel == 1){
				$output['status']='success';
				$output['message']	= 'user deleted';
			 }else{
				$output['status']='failed';
				$output['message']	= 'user not found';
			 }
		 }else{
			$status= $this->setStatus();
			$output['status'] = 'error';
			$output['message'] = 'method not allowed';
		}
		echo json_encode($output);
    }
	public function search(){	
		$this->setHeader();
        $data = $this->model('Registration_model')->search($_GET['query']);
		$output['status']='success';
		$output['data']=$data ;
 		echo json_encode($data);
     }

	public function getparam(){
		$arg = explode('/',$_GET['url'] );
		return $arg[2];;
	}
	public function setHeader(){
		$header[0] = header('Access-Control-Allow-Origin: *');
		$header[1] = header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
		$header[2] = header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		$header[3] = header('Access-Control-Allow-Credentials: true');
		$header[4] = header('Content-Type: application/json; charset=UTF-8');
		return $header;
	}
	
public function setStatus(){
		return header('HTTP/1.0 405 Method Not Allowed');
		 
}
	
	

}