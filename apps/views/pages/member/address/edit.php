<h3 class="content_edit">Member Control Panel  Modify Address List</h2>
<style>
    .markcolor{ color:red}
</style>
<?php
if (count($record)):
    foreach ($record as $org_info):
    endforeach;
endif;

$address_title = array(
    'name' => 'address_title',
    'id' => 'address_title',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->address_title
);
$address = array(
    'name' => 'address',
    'id' => 'address',
    'class' =>'form_normal',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => $org_info->address
);

?>
<div class="infobox" style="width: 550px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <?php echo form_open_multipart($this->uri->uri_string()); ?>
    <?php echo $this->session->flashdata('message'); ?>
     <input name="id" value="<?php echo $org_info->id; ?>" class="form_normal" type="hidden">
     Name<br>
     <?php echo form_input($address_title); ?>
    <span class="markcolor"><?php echo ucwords(form_error('address_title')); ?></span> 
    <br>
    Address <br>
     <?php echo form_input($address); ?>
    <span class="markcolor"><?php echo ucwords(form_error('address')); ?></span> 
    <br><br />
    <input src="<?php echo base_url(); ?>public/images/skicka_button.gif" name="submit" value="Submit" class="submit" type="image">
    <?php echo form_close(); ?>
</div>
