
<div class="grid_16" id="header">
    <!-- MENU START -->
    <div id="menu">
        <ul class="group" id="menu_group_main">
                     
           
            <li class="item first" id="four"><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($mainTab == "orders"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner orders"><?php echo $this->lang->line('order_tab');?></span></span></a></li>
            <li class="item middle" id="one"><a href="<?php echo base_url(); ?>admin/info/global_settings" <?php if($mainTab == "configuration"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner content"><?php echo $this->lang->line('configuration_tab');?></span></span></a></li>
           <li class="item middle" id="seven"><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($mainTab == "letter"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner newsletter">letter</span></span></a></li>        
            <li class="item middle" id="two"><a href="<?php echo base_url(); ?>admin/info/view_registered_customer" <?php if($mainTab == "customer"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner  dashboard"><?php echo $this->lang->line('customer_tab');?></span></span></a></li>
            <li class="item middle" id="two"><a href="<?php echo base_url(); ?>admin/info/view_previlige" <?php if($mainTab == "previlization"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner  media_library">Previlization</span></span></a></li>
            <li class="item middle" id="six"><a href="<?php echo base_url(); ?>admin/info/view_org_bill" <?php if($mainTab == "billing"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner event_manager">Billing</span></span></a></li>        
           
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>admin/info/view_organisation_message" <?php if($mainTab == "inbox"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner settings">Inbox</span></span></a></li>        
            <li class="item last" id="three"><a href="<?php echo base_url(); ?>admin/info/view_archive_letter" <?php if($mainTab == "history"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner reports">History</span></span></a></li>
        </ul>
    </div>
    <!-- MENU END -->
</div>

<div class="grid_16">
    <!-- TABS START -->
    <div id="tabs">
        <div class="container">
            <ul>
      
                <?php if($mainTab == "orders" || $mainTab == "letter" || $activeTab == "message"): ?>
				<li><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($activeTab == "view_letter"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('order_letters');?></span></a></li>
                <li><a href="<?php echo base_url(); ?>admin/info/view_organisation_message" <?php if($activeTab == "message"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('order_new_customer');?></span></a></li>                   
			   
                <?php elseif($mainTab == "users"): ?>
				<li><a href="<?php echo base_url(); ?>admin/backend/user" <?php if($activeTab == "create"): ?> class="current"<?php endif; ?>><span>Create User</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/backend/view_user" <?php if($activeTab == "view_user"): ?> class="current"<?php endif; ?>><span>View User</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/backend/change_password" <?php if($activeTab == "password"): ?> class="current" <?php endif; ?>><span>Password Change</span></a></li>
			   
                
            
                <?php elseif($mainTab == "letterssss"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_letter" <?php if($activeTab == "view_letter"): ?> class="current"<?php endif; ?>><span>Letters</span></a></li>                   
				<li><a href="<?php echo base_url(); ?>admin/info/datewise_search" <?php if($activeTab == "datewise_search"): ?> class="current"<?php endif; ?>><span>Search By Date</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/info/titlewise_search" <?php if($activeTab == "titlewise_search"): ?> class="current"<?php endif; ?>><span>Search By Title</span></a></li>
			  <?php //add_cost , view_zone,view_package,view_org_type?>
               <?php elseif($mainTab == "configuration"): ?>
               
               	<li><a href="<?php echo base_url(); ?>admin/info/global_settings" <?php if($activeTab == "global_settings"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('global_settings');?></span></a></li>                   
    			<li><a href="<?php echo base_url(); ?>admin/info/currency" <?php if($activeTab == "currency"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('currency');?></span></a></li>
   				<li><a href="<?php echo base_url(); ?>admin/info/packages" <?php if($activeTab == "packages"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('packages');?></span></a></li>
   				<li><a href="<?php echo base_url(); ?>admin/info/org_category" <?php if($activeTab == "org_category"): ?> class="current"<?php endif; ?>><span><?php echo $this->lang->line('org_category');?></span></a></li>

                <?php elseif($mainTab == "organization"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_register_org" <?php if($activeTab == "org"): ?> class="current"<?php endif; ?>><span>View Organization</span></a></li>                   
			   <?php elseif($mainTab == "previlization"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_previlige" <?php if($activeTab == "view_previlige"): ?> class="current"<?php endif; ?>><span>Set Previlize</span></a></li>                   
    			<li><a href="<?php echo base_url(); ?>admin/info/view_org_previlize" <?php if($activeTab == "previlige_edit"): ?> class="current"<?php endif; ?>><span>View Setting</span></a></li>                   
			   <?php elseif($mainTab == "billing"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_org_bill" <?php if($activeTab == "bill"): ?> class="current"<?php endif; ?>><span>Billing</span></a></li>                   
			   <?php elseif($mainTab == "inbox"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_organisation_message" <?php if($activeTab == "message"): ?> class="current"<?php endif; ?>><span>Inbox</span></a></li>                   
			   <?php elseif($mainTab == "history"): ?>
    			<li><a href="<?php echo base_url(); ?>admin/info/view_archive_letter" <?php if($activeTab == "view_archive_letter"): ?> class="current"<?php endif; ?>><span>View Archive letter</span></a></li>                   
               <?php else: ?>
             <?php endif; ?>          
            </ul>
        </div>
    </div>
    <!-- TABS END -->    
</div>
