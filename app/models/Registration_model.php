<?php

class Registration_model{
    private $table = 'users';
    private $db; 
	private $dataImage;
	private $newimg;
	private $encrypted;
	public function __construct(){
        $this->db = new Database;
    }
    public function getAll(){
		$data=null;
        $this->db->query('SELECT * FROM ' .$this->table);
		$get = $this->db->resultSet();
		if( $get  > 0){
			foreach($get as $row){
					$data[] =array(
					'id'=>$row['id'],
					'register'=>$row['register'],
					'name'=>$row['name'],
					'email'=>$row['email'],
 				);
			}
		}
		return $data;
    }
	public function create($data){
		$encrypted = password_hash($data['password'], PASSWORD_DEFAULT);
		$dataImage['image']		= $data['image'];
		$dataImage['img_name']	= $data['img_name'];
		$dataImage['img_ext']	= $data['img_ext'];
		$Image = Image::compress($dataImage);
        $query = "INSERT INTO " .$this->table ." VALUE ( '',:register, :name, :email, :password, :avatar, :thumbnail )";
        $this->db->query($query);
        $this->db->bind('register',	$data ['register']);
        $this->db->bind('name',		$data ['name']);
        $this->db->bind('email',	$data ['email']);
        $this->db->bind('password',	$encrypted		);
        $this->db->bind('avatar',	$Image['avatar']);
        $this->db->bind('thumbnail',$Image['thumbnail']);
        $this->db->execute();
        return  $this->db->rowCount();
    }
	public function getById($id){
        $this->db->query('SELECT * FROM ' .$this->table	.' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
	public function edit($data){
		if( empty($data['image']) &&  empty($data['password'])){
			$query    = 'UPDATE ' .$this->table. ' SET
			  name    = :name, 
			  email   = :email  
			WHERE id  = :id';
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('name', $data['name']);
			$this->db->bind('email', $data['email']);		
		}
		if(!empty($data['image'])){
			$oldImage['old_ava']	= $data['old_ava'];
			$oldImage['old_thumb']  = $data['old_thumb'];
			Image::deleteImg($oldImage);		
			$dataImage['image']		= $data['image'];
			$dataImage['img_name']	= $data['img_name'];
			$dataImage['img_ext']	= $data['img_ext'];
			$newimg = Image::compress($dataImage);
 			$query     = 'UPDATE ' .$this->table. ' SET
			  name     = :name, 
			  email    = :email, 
			  avatar   = :avatar,
			  thumbnail= :thumbnail
			WHERE id  = :id';
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('name', $data['name']);
			$this->db->bind('email', $data['email']);	
			$this->db->bind('avatar', $newimg['avatar']);	
			$this->db->bind('thumbnail', $newimg['thumbnail']);
		}
		if(!empty($data['password'])){
			$encrypted = password_hash($data['password'], PASSWORD_DEFAULT);
 			$query    = 'UPDATE ' .$this->table. ' SET
			  name    = :name, 
			  email   = :email, 
			  password= :password
			WHERE id  = :id';	
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('name', $data['name']);
			$this->db->bind('email', $data['email']);	
			$this->db->bind('password', $encrypted);	
			 
 		}
		if(!empty($data['password']) && !empty($data['image'])){
			$query     = 'UPDATE ' .$this->table. ' SET
			  name     = :name, 
			  email    = :email, 
			  password = :password, 
			  avatar   = :avatar,
			  thumbnail= :thumbnail
			WHERE id  = :id';
			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('name', $data['name']);
			$this->db->bind('email', $data['email']);	
			$this->db->bind('password', $encrypted);	
			$this->db->bind('avatar', $newimg['avatar']);	
			$this->db->bind('thumbnail', $newimg['thumbnail']);
			
		}

		$this->db->execute();
        return $this->db->rowCount() ;
    }
	public function deleteId($id){
		$delete = self::getById($id);
		$oldImage['old_ava']=$delete['avatar'];
		$oldImage['old_thumb']=$delete['thumbnail'];
		$deleteold=Image::deleteImg($oldImage);		

		if($deleteold == true){
			$query = 'DELETE FROM '.$this->table.' WHERE id = :id';
			$this->db->query($query);
			$this->db->bind('id',$id);
			$this->db->execute();
		}

        return $this->db->rowCount();
 
    }
	public function search($keyword){
		$i=0;
        $query = 'SELECT id, register , name FROM '.$this->table.' WHERE (register LIKE :keyword OR name LIKE :keyword)';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        //return  $this->db->resultSet();
			$row = $this->db->resultSet();
			$x=0;
			foreach ($row as $key => $value) {
			$data[$x]['data'] = $value['register']." || ".$value['name'];
			$data[$x]['id']   = $value['id'];
			$x++;   
			}
 		return $data;
    }
}
