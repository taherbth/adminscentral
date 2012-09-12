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
<a href="<?php echo base_url(); ?>main/add_customer">
<button><?php echo $this->lang->line('org_registration_link');?></button>
<!--<img src="<?php echo base_url(); ?>public/images/organization_-registration.png" alt="" border="0" >
--></a>
</div>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
      <h1><?php echo $this->lang->line('member_login_header');?></h1>
    	<div id="login">
    	 <!-- Start: languagebg-->
			<div class="languagebg">
					<form name="langselect" id="langselect" method="post">                        
						<select name="site_language" onChange="document.langselect.submit()" class="selang"> 
							<option value="sv" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="sv"){?> selected="selected" <?php }?>> <?php echo $this->lang->line('sv_lang');?></option> 
							<option value="engus" <?php if($this->session->userdata('lang_file')!=""      && $this->session->userdata('lang_file')=="engus"){?> selected="selected" <?php }?>><?php echo $this->lang->line('eng_us_lang');?></option> 
							<option value="enguk" <?php if($this->session->userdata('lang_file')!=""  && $this->session->userdata('lang_file')=="enguk"){?> selected="selected" <?php }?>><?php echo $this->lang->line('eng_uk_lang');?></option> 
							<option value="ger" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="ger"){?> selected="selected" <?php }?>><?php echo $this->lang->line('ger_lang');?></option> 
							<option value="nor" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="nor"){?> selected="selected" <?php }?>><?php echo $this->lang->line('nor_lang');?></option> 
							<option value="den" <?php if($this->session->userdata('lang_file')!=""       && $this->session->userdata('lang_file')=="den"){?> selected="selected" <?php }?>><?php echo $this->lang->line('den_lang');?></option> 
							<option value="fin" <?php if($this->session->userdata('lang_file')!=""         && $this->session->userdata('lang_file')=="fin"){?> selected="selected" <?php }?>><?php echo $this->lang->line('fin_lang');?></option> 
						</select>
					</form>
            </div> <!-- End: languagebg-->
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
