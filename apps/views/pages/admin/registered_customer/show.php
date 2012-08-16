<h3 class="content_edit"><?php echo $this->lang->line('new_customer_req_msg');?> </h2>

<?php echo $this->session->flashdata('message'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view.css" />

<?php
foreach ($query1 as $info):
    $query = $this->db->query("select * from package where id='" . $info->package_name . "'");
    
    foreach ($query->result() as $p) {
        $p_name = $p->package_name;
        $currency_data = $this->info_model->get_currency($p->currency_id);
    }
    /*$query1 = $this->db->query("select zone from zone where id='" . $info->area_name . "'");
    foreach ($query1->result() as $p1) {
        $a_name = $p1->zone;
    }*/
    if (!empty($p_name)):$p_name = $p_name;
    else:$p_name = "";
    endif;
    /*if (!empty($a_name)):$a_name = $a_name;
    else:$a_name = "";
    endif;*/
    ?>
    <div class="SearchListing">
        <div style="width:900px; float:left; position:relative">
            <div class="ListingDetails">
                <ul> <li><label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_no');?>:</b> </label> <span class="HighLight"><?php echo $info->org_number; ?> </span><br>
                        <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_name');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->org_name; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_address');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->org_primary_address; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_org')."&nbsp;".$this->lang->line('label_phone');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->org_phone; ?></span> <br>
                </ul>
            </div>
            <div class="ListingDetails">
                <ul><li><label class="From"><b><?php echo $this->lang->line('label_username')?>:</b> </label> <span class="HighLight"><?php echo $info->first_name; ?> <?php echo $info->last_name; ?> </span><br>
                        <label class="From"><b><?php echo $this->lang->line('label_phone')."&nbsp;".$this->lang->line('label_no');?>:</b></label> 
                        <span class="HighLight"><?php echo $info->phone_no; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_address')?>:</b></label> 
                        <span class="HighLight"><?php echo $info->address; ?></span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_email')?>:</b></label> 
                        <span class="HighLight"><?php echo $info->email; ?></span> <br>
                </ul>
            </div>
            <div class="ListingDetails">
                <ul><li><label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_name');?>:</b> </label> <span class="HighLight"><?php echo $p_name ?> </span><br>
                        
                        <label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;". $this->lang->line('label_amount');?>:</b></label> 
                        <span class="HighLight"><?php if(count($p->amount)):echo $p->amount;endif; ?> (<?php echo $currency_data[0]->currency_name;?>)</span> <br>
                        <label class="From"><b><?php echo $this->lang->line('label_package')."&nbsp;".$this->lang->line('label_duration');?>:</b></label> 
                        <span class="HighLight"><?php echo $p->duration; ?> <?php echo $this->lang->line('label_year')?></span> <br>
                </ul>
            </div>
        </div>
        <div style="width:900px; float:left; height:50px; padding-left:250px">
            <?php
            $p = $info->payment_status;
            $a = $info->approval_status;
            $l = $info->login_status;
            if ($p == 1 && $a == 1) {
                ?>

                <a href="<?php echo base_url(); ?>admin/info/approve_org/<?php echo $info->id; ?> " title="Edit the Content">
                    <img src="<?php echo base_url(); ?>public/images/approve.png" alt="" border="0">
                </a>&nbsp;&nbsp;&nbsp;<a  href="<?php echo base_url() ?>admin/info/deny_org/<?php echo $info->id; ?>" title="">
                    <img src="<?php echo base_url(); ?>public/images/deny.png" alt="" border="0">
                </a>

            <?php }
            if ($p == 1 && $a == 2) { ?>
                <img src="<?php echo base_url(); ?>public/images/approved.png" alt="" border="0">&nbsp;&nbsp;&nbsp;<a  href="" title=""><img src="<?php echo base_url(); ?>public/images/unpaid.png" alt="" border="0"></a>
                <?php
            }
            if ($p == 2 && $a == 2) {
                ?>
                <a href="#" title=""> <img src="<?php echo base_url(); ?>public/images/approved.png" alt="" border="0"></a>&nbsp;&nbsp;&nbsp;<a  href="" title=""> <img src="<?php echo base_url(); ?>public/images/paid.png" alt="" border="0"></a></td>
                <?php
            }
            ?>  


        </div>

    </div>

<?php endforeach; ?>


