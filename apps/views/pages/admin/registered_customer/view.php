<h3 class="content_edit">Admin Control Panel View All Registered Organization  </h2>
<?php echo $this->session->flashdata('message');
    echo anchor(base_url()."admin/info/add_customer", $this->lang->line('label_create_new'));
?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/public/css/view22.css" />
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
    /*
    if (!empty($a_name)):$a_name = $a_name;
    else:$a_name = "";
    endif;*/
    ?>
    <div class="SearchListing" style="margin:10px 20px 10px 20px" >

        <div class="ListingDetails">
            <ul> 

                <li>
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px">Organization:</font></b> </label><br />
                    <label class="From"><b>Org No:</b> </label> <span class="HighLight" style="color:#990033; font-size:13px; font-weight:bold"><?php echo $info->org_number; ?> </span><br>
                    <label class="From"><b>Org Name:</b></label> 
                    <span class="HighLight"><?php echo $info->org_name; ?></span> <br>                   
                    <label class="From"><b>Org Phone:</b></label> 
                    <span class="HighLight"><?php echo $info->org_phone; ?></span> <br>
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px">Credit Card:</font></b> </label><br />

            </ul>
        </div>
        <div class="ListingDetails">
            <ul>
                <li>
                    <label class="From"><b>Name On Card:</b></label> 
                    <span class="HighLight"><?php echo $info->name_on_card; ?></span> <br>
                    <label class="From"><b>Expire Date:</b></label> 
                    <span class="HighLight"><?php echo $info->expire_date; ?></span> <br>
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px">Responsible person</font></b> </label><br />
                    <label class="From"><b>Name:</b></label> 
                    <span class="HighLight"><?php echo $info->first_name; ?> <?php echo $info->last_name; ?></span> <br>
                    <label class="From"><b>Phone No:</b></label> 
                    <span class="HighLight"><?php echo $info->phone_no; ?></span> <br>

            </ul>
        </div>
        <div class="ListingDetails">
            <ul><li>

                    <label class="From"><b>Email:</b></label> 
                    <span class="HighLight"><?php echo $info->email; ?></span> <br>  
                    <label class="From"><b><font style="color: green; font-weight:bold; font-size:11px">Package:</font></b> </label><br />
                    <label class="From"><b>Package Name:</b> </label> <span class="HighLight"><?php echo $p_name ?> </span><br>
                    <label class="From"><b>Package Amount:</b></label> 
                    <span class="HighLight"><?php echo $p->amount; ?> (<?php echo $currency_data[0]->currency_name; ?>)</span> <br>
                    <label class="From"><b>Package Duration:</b></label> 
                    <span class="HighLight"><?php echo $p->duration; ?> Year</span> <br>
                    <label class="From"><b>Area Name:</b></label> 
                    
            </ul>

        </div>
        <div class="ListingDetails">
            <a href="<?php echo base_url(); ?>admin/info/view_org_detail/<?php echo $info->id; ?> ">      
                <button>View Details </button>
            </a>

        </div>

    </div>

<?php endforeach; ?>





