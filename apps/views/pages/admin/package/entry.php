<?php 

if($global_settings_data){
        foreach($global_settings_data as $rows)
        {				
            $sms_cost = $rows->per_sms_cost;
            $letter_cost = $rows->per_letter_cost;
            $invoice_cost = $rows->per_invoice_cost;
            $sms_per_month = $rows->allowed_sms_per_month;
            $letter_per_month = $rows->allowed_letter_per_month;                     
        }
}

$package_name = array(
              'name'      => 'package_name',
              'id'        => 'package_name',
              'value'     => $package_name,          
			  'class'     => 'form_normal'              
            );
		  		
		 $no_of_member = array(
              'name'      => 'no_of_member',
              'id'        => 'no_of_member',
              'value'     => $no_of_member,          
			  'class'     => 'form_normal'              
            );
         
		 $duration = array(
              'name'      => 'duration',
              'id'        => 'duration',
              'value'     => $duration,          
			  'class'     => 'form_normal'              
            );
            
		  $amount = array(
              'name'      => 'amount',
              'id'        => 'amount',
              'value'     => $amount,          
			  'class'     => 'form_normal'              
            );
        
        $sms_cost = array(
              'name'      => 'sms_cost',
              'id'        => 'sms_cost',
              'value'     => $sms_cost,          
			  'class'     => 'form_normal'              
            );
		  
           $letter_cost = array(
              'name'      => 'letter_cost',
              'id'        => 'letter_cost',
              'value'     => $letter_cost,          
			  'class'     => 'form_normal'              
            );
          
          $currency_option = $currency_data;
		   
		   $submit = array(
				'name'    => 'submit',
				'id'      => 'submit',
				'value'   => 'Save',
				'type'    => 'submit',
				'class'   => 'submit-btn'
			);

?>


<style>
    .markcolor{ color:red}
    .style1 {color: #FF3333}
</style>
<h3 class="content_edit"><?php echo $this->lang->line('package_entry_msg');?></h2>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">

    <?php echo form_open_multipart("admin/info/added_package"); ?>
    <?php echo $this->session->flashdata('message'); ?>


    <?php echo $this->lang->line('label_package_name');?><span class="style1">*</span><br>
    <?=form_input($package_name);?>
    <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('package_name')); ?></span> 
    
    <?php echo $this->lang->line('label_no_of_member');?><span class="style1">*</span><br>
    <?=form_input($no_of_member);?><br><br>   
    <span class="markcolor"><?php echo ucwords(form_error('no_of_member')); ?></span>  
    
    <?php echo $this->lang->line('label_duration');?><span class="style1">*</span><br>
    <?=form_input($duration);?>   <?php echo $this->lang->line('label_month');?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('duration')); ?></span>
    
    <?php echo $this->lang->line('label_subscription_fee')."/".$this->lang->line('label_month');?><span class="style1">*</span><br>
    <?=form_input($amount);?><br><br>
    <span class="markcolor"><?php echo ucwords(form_error('amount')); ?></span>
    
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_sms');?><span class="style1">*</span><br>
    <?=form_input($sms_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('sms_cost')); ?></span>
    
    <?php echo $this->lang->line('label_cost')."/".$this->lang->line('label_letter');?><span class="style1">*</span><br>
    <?=form_input($letter_cost);?> <br><br>
    <span class="markcolor"><?php echo ucwords(form_error('letter_cost')); ?></span>
    <?php echo $this->lang->line('label_currency');?>
    <span class="style1">*</span><br>
    <?=form_dropdown('currency_id',$currency_option,'','class="form_input_select"');?>
    
    
    <!--select name="currency" style="width:160px">
        <option value="">Select</option>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <option value="GBP">GBP</option>
        <option value="CAD">CAD</option>
        <option value="AUD">AUD</option>
    </select-->
    
    <span class="markcolor"><?php echo ucwords(form_error('currency_id')); ?></span>

    <br><br>
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">

    <?php echo form_close(); ?>
</div>
