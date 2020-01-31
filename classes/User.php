<?php
 class User{
 	private $_db,
 	        $_data,
 	        $_sessionName,
 	        $_isLoggedIn;

 	 public function  __construct($user = null){
      $this->_db = DB::getInstance();
      $this->_sessionName = Config::get('session/session_name');

      if(!$user){
      	if(Session::exists($this->_sessionName)){
          $user = Session::get($this->_sessionName);

          if($this->find($user)){
            $this->_isLoggedIn = true;
          }else{

          }
      	}
        
      }else{
      	$this->find($user);
      }
 	 }
/*
   public function update($fields = array(), $id = null){

    if(!$id && $this->isLoggedIn()){
      $id = $this->data()->id;
    }

    if(!$this->_db->update('product', $id, $fields)){
      throw new Exception("There was a problem updating...");
      
    }
  }
*/
   public function update_all($table, $column, $sid,  $fields = array()){
    if(!$this->_db->update($table, $column, $sid, $fields)){
      throw new Exception("There was a problem updating...");
    }

   }

   public function create($fields = array()){
       if(!$this->_db->insert('admin_users', $fields)){
          throw new Exception("There was a problem creating an account");
          
       }
   }

  public function create_all($table,$fields = array()){
       if($this->_db->insert($table, $fields)){
       
          return true;
       }
   }



  public function chatagori_create($fields = array()){
       if(!$this->_db->insert('product_catagori', $fields)){
          throw new Exception("There was a problem add chatagori...");
          
       }
   }


  public function get_all($table, $id){
      $sql = "SELECT * FROM {$table} ORDER BY $id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }



     public function get_menu($table){
      $sql = "SELECT * FROM {$table} ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function row_one($table, $id){
     $sql = "SELECT * FROM {$table} WHERE id = '$id'";
     $data = $this->_db->row();
     return $data;
   }

  public function get_cata($chatagori, $part){
      $sql = "SELECT * FROM content WHERE chatagori = '$chatagori' AND  content_part = '$part' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function get_product_cata(){
      $sql = "SELECT DISTINCT main_catagori FROM product_catagori ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

    public function get_product_sub_cata_for_manu($value){
      $sql = "SELECT DISTINCT sub_chatagori FROM product_catagori WHERE main_catagori = '$value'";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

 public function get_product_sub_cata(){
      $sql = "SELECT * FROM product_catagori ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

     public function getData_main_cata($table, $culam ,$id){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$id' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }



  public function getData_one($table, $culam ,$id){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$id' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function search_result($search){
      $sql = "SELECT * FROM product WHERE subchatagori LIKE '$search%' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


  public function remove($table, $column, $id){
     $this->_db->delete($table, array($column, '=', $id));
     return true;
   }

  

  public function find($user = null){
       if($user){
         $field = (is_numeric($user)) ? 'admin_id' : 'username';
         $data = $this->_db->get('admin_users', array($field, '=', $user));
          if($data->count()){
            $this->_data = $data->first();
            return true;
          }
       }
       return false;
   }

  public function login($username = null, $password = null){
      $user = $this->find($username);

      if(!$username && !$password && $this->exists()){
        Session::put($this->_sessionName, $this->data()->id);
      }else{

         if($user){
          if($this->data()->password === Hash::make($password, $this->data()->salt)){
            Session::put($this->_sessionName, $this->data()->admin_id);

            return true;
          }
         }
     }
       return false;
   }


 	public function data(){
 	 	return $this->_data;
 	 }

  public function exists(){
    return (!empty($this->_data)) ? true : false;
   }

   public function logout(){
    Session::delete($this->_sessionName);
    //session_destroy();
   }

 	public function isLoggedIn(){
 	 	return $this->_isLoggedIn;
 	 }
 }



?>