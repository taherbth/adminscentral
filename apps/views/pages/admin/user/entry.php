<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
    'style' => 'border:1px solid #CCC;',
	'size'	=> 50,
	'value' =>  '',
    'style' => 'border:1px solid #CCC;'	
);
$emp_name = array(
	'name'	=> 'emp_name',
	'id'	=> 'emp_name',
    'style' => 'border:1px solid #CCC;',
	'size'	=> 50,
	'value' =>  '',
    'style' => 'border:1px solid #CCC;'	
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
    'style' => 'border:1px solid #CCC;',
	'size'	=> 50,
	'value' =>  '',
    'style' => 'border:1px solid #CCC;'	
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'size'	=> 50,
	'value' => '',
    'style' => 'border:1px solid #CCC;'	

);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
    'style' => 'border:1px solid #CCC;',
	'size'	=> 50,
	'value' => '',
    'style' => 'border:1px solid #CCC;'	
);

$checkbox1 = array(
    'name'        => 'sale_prev',
    'id'          => 'sale_prev',
    'value'       => 1,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
$checkbox2 = array(
    'name'        => 'engineering_prev',
    'id'          => 'engineering_prev',
    'value'       => 1,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
$checkbox3 = array(
    'name'        => 'commercial_prev',
    'id'          => 'commercial_prev',
    'value'       => 1,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
$checkbox4 = array(
    'name'        => 'hr_prev',
    'id'          => 'hr_prev',
    'value'       => 1,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
	
$checkbox5 = array(
    'name'        => 'configuration_prev',
    'id'          => 'configuration_prev',
    'value'       => 1,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );

?>
<style>
.markcolor{ color:red}
legend { vertical-align:middle
    -moz-border-radius: 10px 10px 10px 10px;
    background-color: #499DC4;
    color: White;
    font: bold 12px Arial;
    padding: 5px 10px;
    text-align: center;
}
.success{ color:green;}
</style>
<p></p>
<div class="infobox" style="width: 450px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
<?php echo form_open($this->uri->uri_string()); ?>
 <p class="error"> <?php echo $this->session->flashdata('message'); ?></p> 
Name:<br>
<input name="name" class="form_normal" type="text">
<br><br>
 <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span> 
Username:<br>
<input name="username" class="form_normal" type="text">
<span class="markcolor"><?php echo ucwords(form_error('username')); ?></span>           

<br><br>

Password<br>
<input name="password" class="form_normal" type="password">
<span class="markcolor"><?php echo ucwords(form_error('password')); ?></span>

<br>

Re-Type Password:<br>
<input name="confirm_password" class="form_normal" type="password">
<span class="markcolor"><?php echo ucwords(form_error('confirm_password')); ?></span>

<br>

Email:<br>
<input name="email" class="form_normal" type="text">
<span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>

<br>
UserType:<br>
 <select name="user_type">
                    <option value="5">SuperAdmin</option>
                    <option value="7">Admin</option>
                </select><br><br>


<input src="<?php echo base_url();?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

<?php echo form_close(); ?>
</div>
