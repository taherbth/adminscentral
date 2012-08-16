<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/login.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/960.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/text.css" media="screen" />
<div style="width:180px; float:right; padding-top:5px; padding-left:10px; color:green; font-size:18px;">
<?php $query=$this->db->query("select * from user_info where approval_status=2 && login_status=2");?>
<?php echo form_open("organization/org/view_presentaion"); ?>
 <select name="org_id">
  <?php foreach($query->result() as $info):?>
      <option value="<?php echo $info->id;?>"><?php echo $info->org_name;?></option>
  <?php endforeach;?>
  </select>
<input type="submit" value="go" />
 <?php echo form_close(); ?>
</div>

<div style="width:200px; float:right; padding-top:5px; padding-left:20px; color:green; font-size:18px;">
<a href="<?php echo base_url(); ?>main/add_org">
<button>Organization Registration</button>
<!--<img src="<?php echo base_url(); ?>public/images/organization_-registration.png" alt="" border="0" >
--></a>
</div>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Member - Login</h1>
    	<div id="login">
    	
          <p class="error"> <?php echo $this->session->flashdata('message'); ?></p>        
    	 <?php echo form_open('home/process_login'); ?>
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="username" class="inputText" id="textfield" />
    	      </label>
<span class="markcolor"><?php echo ucwords(form_error('username')); ?></span>               
  	      </p>
    	    <p>
    	      <label><strong>Password</strong>
  <input type="password" name="password" class="inputText" id="textfield2" />
  	        </label>
              <span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>   
    	    </p>
             <input  type="submit" name="login" value="Sign in" class="black_button">
             <label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label>            
    	   <?php echo form_close(); ?>
		  <br clear="all" />
    	</div>
        <div id="forgot">
       </div>
  </div>
</div>
<br clear="all" />
