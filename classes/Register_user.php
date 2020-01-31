<?php

class Register_user{

	private $_db,
 	        $_data,
 	        $_sessionuserName,
          $_sessionuserPhone,
 	        $_isLoggedInuser;

 	 public function  __construct($user = null){
      $this->_db = DB::getInstance();
      $this->_sessionuserName = Config::get('session/session_register');
      $this->_sessionuserPhone = Config::get('session/userphone');

          if(!$user){
        if(Session::exists($this->_sessionuserName)){
          $user = Session::get($this->_sessionuserName);

          if($this->find($user)){
            $this->_isLoggedInuser = true;
          }else{

          }
        }
        
      }else{
        $this->find($user);
      }
      
 	 }


      public function find($user = null){
       if($user){
         $field = (is_numeric($user)) ? 'register_id' : 'email';
         $data = $this->_db->get('register', array($field, '=', $user));
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
        Session::put($this->_sessionuserName, $this->data()->register_id);
      }else{

         if($user){
          if($this->data()->password === Hash::make($password, $this->data()->salt)){
            Session::put($this->_sessionuserName, $this->data()->register_id);

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
  public function isLoggedInuser(){
    return $this->_isLoggedInuser;
   }

   public function logout(){
    Session::delete($this->_sessionuserName);
    //session_destroy();
   }


   public function update_all($table, $column, $sid,  $fields = array()){
    if(!$this->_db->update($table, $column, $sid, $fields)){
      throw new Exception("There was a problem updating...");
    }

   }

     public function get_all($table){
      $sql = "SELECT * FROM {$table} ORDER BY `product_id` ASC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

    public function get_limit_future_pro($table){
      $sql = "SELECT * FROM {$table} ORDER BY `product_id` ASC LIMIT 5";
      $data = $this->_db->getInfo($sql);
      return $data;
   }
   
 	  public function getProduct_item(){
      $sql = "SELECT * FROM product WHERE `status`= 1  ORDER BY `product_id` DESC LIMIT 4";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function getblogPost_limit(){
      $sql = "SELECT * FROM blog ORDER BY `blog_id` DESC LIMIT 3";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


   public function getBlogpost(){
      $sql = "SELECT * FROM blog ";
      $data = $this->_db->getInfo($sql);
      return $data;

   }

   public function getchat_product($table, $culam, $chata){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$chata' AND `status`= 1";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function servicePackges($table, $culam, $chata){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$chata'";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function getchat_product_main_sub($table, $culam, $culam1, $chata, $chata1){
      $sql = "SELECT * FROM {$table} WHERE `$culam` = '$chata' AND `$culam1` = '$chata1' AND `status`= 1";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function get_Related_Products($table, $culam, $culam1, $chata, $chata1, $pro_id){
      $sql = "SELECT * FROM {$table} WHERE `$culam` = '$chata' AND `$culam1` = '$chata1' AND product_uq_id != '$pro_id' AND `status`= 1 ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }
 
     public function getData_one_cul($table, $culam, $id){
      $sql = "SELECT * FROM {$table} WHERE {$culam} = '{$id}' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

     public function getCartitemWithAjax($id, $placeholders){
      $sql = "SELECT * FROM `product` WHERE `product_id` IN ($placeholders)";
      $data = $this->_db->ajaxgetInfo($sql, $id);
      return $data;
   }

   public function getCartitem($table, $culam ,$id){
    $sql = "SELECT * FROM {$table} WHERE $culam = '$id'";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


     public function getProduct_option($id, $value){
      $sql = "SELECT * FROM `product_option` WHERE `option_product_id` = '$id' AND option_name = '$value' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


   public function get_images($id){
      $sql = "SELECT * FROM product_gelary WHERE product_id = '$id' LIMIT 5";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function get_main_cata(){
    $sql = "SELECT DISTINCT main_catagori FROM product_catagori";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function get_product_sub_cata_font($chata){
      $sql = "SELECT DISTINCT sub_chatagori FROM product_catagori WHERE main_catagori ='$chata'";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

     public function get_product_sub_cata(){
      $sql = "SELECT DISTINCT main_catagori FROM product_catagori ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function create_all($table,$fields = array()){
       if($this->_db->insert($table, $fields)){
          return true;
       }
   }

   public function create($fields = array()){
       if(!$this->_db->insert('register', $fields)){
          throw new Exception("There was a problem creating an account");
       }
   }

}



?>