<div class="grid_16" id="header">
    <!-- MENU START -->
    <div id="menu">
        <ul class="group" id="menu_group_main">
            <li class="item first" id="four"><a href="<?php echo base_url(); ?>organization/back/profile" <?php if ($mainTab == "home"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner home">Home</span></span></a></li>
            <li class="item middle" id="seven"><a href="<?php echo base_url(); ?>organization/info/view_mainboard" <?php if ($mainTab == "mainboard"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner mainboard">Mainboard</span></span></a></li>        
            <li class="item middle" id="one"><a href="<?php echo base_url(); ?>organization/info/add_cost" <?php if ($mainTab == "Configuration_org"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner dashboard">Configuration</span></span></a></li>
            <li class="item middle" id="two"><a href="<?php echo base_url(); ?>organization/info/add_member" <?php if ($mainTab == "member"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner users">Member</span></span></a></li>
            <li class="item middle" id="two"><a href="<?php echo base_url(); ?>organization/info/view_previlige" <?php if ($mainTab == "previlization_org"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner media_library">Previlization</span></span></a></li>
            <li class="item middle" id="six"><a href="<?php echo base_url(); ?>organization/sms/add_sms" <?php if ($mainTab == "sms"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner sms">Sms</span></span></a></li>        
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>organization/info/view_letter" <?php if ($mainTab == "letter_org"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner newsletter">Letter</span></span></a></li>        
            <li class="item middle" id="eight"><a href="<?php echo base_url(); ?>organization/info/view_archive_letter" <?php if ($mainTab == "history"): ?> class="main current" <?php else: ?> class="main" <?php endif; ?>><span class="outer"><span class="inner reports">History</span></span></a></li>        
        </ul>
    </div>
    <!-- MENU END -->
</div>

<div class="grid_16">
    <!-- TABS START -->
    <div id="tabs">
        <div class="container">
            <ul>

                <?php if ($mainTab == "home"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/back/profile" <?php if ($activeTab == "home"): ?> class="current"<?php endif; ?>><span>Home</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/change_password" <?php if ($activeTab == "change_password"): ?> class="current"<?php endif; ?>><span>Change Password</span></a></li>

                <?php elseif ($mainTab == "mainboard"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_mainboard" <?php if ($activeTab == "mainboard"): ?> class="current"<?php endif; ?>><span>Mainboard</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_forum_post" <?php if ($activeTab == "forum"): ?> class="current"<?php endif; ?>><span>Forum</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_all_member_post" <?php if ($activeTab == "article"): ?> class="current"<?php endif; ?>><span>View Article Request</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/add_article_category" <?php if ($activeTab == "create_category"): ?> class="current"<?php endif; ?>><span>Create Article Category</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_article_category" <?php if ($activeTab == "view_category"): ?> class="current"<?php endif; ?>><span>View Article Category</span></a></li>                   
                <?php elseif ($mainTab == "Configuration_org"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/add_cost" <?php if ($activeTab == "cost_setting"): ?> class="current"<?php endif; ?>><span>Cost Settings</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_cost" <?php if ($activeTab == "view_cost"): ?> class="current"<?php endif; ?>><span>View Cost</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/add_user_type" <?php if ($activeTab == "usertype"): ?> class="current"<?php endif; ?>><span>Create UserType</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_user_type" <?php if ($activeTab == "view_usertype"): ?> class="current"<?php endif; ?>><span>View UserType</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/add_group" <?php if ($activeTab == "group"): ?> class="current"<?php endif; ?>><span>Create Group</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_org_group" <?php if ($activeTab == "view_group"): ?> class="current"<?php endif; ?>><span>View Group</span></a></li>
    <!--				<li><a href="<?php //echo base_url();  ?>organization/info/add_group_permission" <?php // if($activeTab == "group_permission"):  ?> class="current"<?php //endif;  ?>><span>Set Group Permission</span></a></li>
    				<li><a href="<?php //echo base_url(); ?>organization/info/view_group_permission" <?php //if($activeTab == "view_group_permission"): ?> class="current"<?php //endif; ?>><span>View Group Permission</span></a></li>
                    -->
                <?php elseif ($mainTab == "member"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/add_member" <?php if ($activeTab == "register_member"): ?> class="current"<?php endif; ?>><span>Register Member</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_register_member" <?php if ($activeTab == "view_register_member"): ?> class="current"<?php endif; ?>><span>View Registered Member</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_expired_membership" <?php if ($activeTab == "view_expired_member"): ?> class="current"<?php endif; ?>><span>View Expired Member</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/set_member_profile" <?php if ($activeTab == "common_setting"): ?> class="current"<?php endif; ?>><span>Member Profile Setting</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/letter/view_member_bill" <?php if ($activeTab == "billing"): ?> class="current"<?php endif; ?>><span>Billing</span></a></li>                   
                <?php elseif ($mainTab == "previlization_org"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_previlige" <?php if ($activeTab == "view_previlige"): ?> class="current"<?php endif; ?>><span>Set Previlize</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_org_previlize" <?php if ($activeTab == "previlige_edit"): ?> class="current"<?php endif; ?>><span>View Previlize Setting</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_previlige_external" <?php if ($activeTab == "view_external_previlige"): ?> class="current"<?php endif; ?>><span>Set External Previlize </span></a></li>                   
    <!--    			<li><a href="<?php //echo base_url();  ?>organization/info/view_org_external_previlize" <?php //if($activeTab == "external_previlige_edit"):  ?> class="current"<?php //endif;  ?>><span>View External Previlize</span></a></li>                   
                    -->             
                <?php elseif ($mainTab == "sms"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_sms" <?php if ($activeTab == "send_sms"): ?> class="current"<?php endif; ?>><span>Send Sms</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_address" <?php if ($activeTab == "contact_list"): ?> class="current"<?php endif; ?>><span>Create Contact List</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/sms/view_address_list" <?php if ($activeTab == "contact_edit"): ?> class="current"<?php endif; ?>><span>View Contact List</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_external_sms" <?php if ($activeTab == "external_sms"): ?> class="current"<?php endif; ?>><span>External sms</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/sms/add_signature" <?php if ($activeTab == "signature"): ?> class="current"<?php endif; ?>><span>Create Signature</span></a></li>
                    <li><a href="<?php echo base_url(); ?>organization/sms/view_signature" <?php if ($activeTab == "view_signature"): ?> class="current"<?php endif; ?>><span>View Signature</span></a></li>                      


                <?php elseif ($mainTab == "letter_org"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_letter" <?php if ($activeTab == "letter_request"): ?> class="current"<?php endif; ?>><span>Letter Request</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/add_letter" <?php if ($activeTab == "create_letter"): ?> class="current"<?php endif; ?>><span>Create Letter</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/add_address" <?php if ($activeTab == "add_address"): ?> class="current"<?php endif; ?>><span> Address List</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/view_address_list" <?php if ($activeTab == "view_list"): ?> class="current"<?php endif; ?>><span>View List</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/add_header" <?php if ($activeTab == "create_header"): ?> class="current"<?php endif; ?>><span>Create Header</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/view_header" <?php if ($activeTab == "view_header"): ?> class="current"<?php endif; ?>><span>View Header</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/add_footer" <?php if ($activeTab == "create_footer"): ?> class="current"<?php endif; ?>><span>Create Footer</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/letter/view_footer" <?php if ($activeTab == "view_footer"): ?> class="current"<?php endif; ?>><span>View Footer</span></a></li>                   
                   	<li><a href="<?php echo base_url(); ?>organization/info/add_external_letter" <?php if ($activeTab == "create_external_letter"): ?> class="current"<?php endif; ?>><span>Create External Letter</span></a></li>                   
                <?php elseif ($mainTab == "history"): ?>
                    <li><a href="<?php echo base_url(); ?>organization/info/view_archive_letter" <?php if ($activeTab == "view_archive_letter"): ?> class="current"<?php endif; ?>><span>View Archive Letter</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_archive_article" <?php if ($activeTab == "view_archive_article"): ?> class="current"<?php endif; ?>><span>Archive Article(Public)</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/article_archive" <?php if ($activeTab == "article_archive"): ?> class="current"<?php endif; ?>><span>Archive Article(Private)</span></a></li>                   
                    <li><a href="<?php echo base_url(); ?>organization/info/view_archive_comments" <?php if ($activeTab == "view_archive_comments"): ?> class="current"<?php endif; ?>><span>View Archive Comments</span></a></li>                   
                <?php else: ?>
                <?php endif; ?>          
            </ul>
        </div>
    </div>
    <!-- TABS END -->    
</div>
