<style>
    input {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    select {
        background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;
    }
    .markcolor p{ font-size: 10px;}
    .inside{}
    ul{ list-style:none}
</style>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"expire_date",
            dateFormat:"%Y-%m-%d"
        });
       
    }
</script>
<script language="javascript">
    function checkAll(master){
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i=0;i<col.length;i++) {
            col[i].checked= checked;
        }
    }
								
</script>
<script type="text/javascript" charset="utf-8"> 
    $(document).ready(function() {
        var loadUrl='<?php echo site_url('organization/info/header_view'); ?>';
        $("select#letter_header").change(function(){
            var name=$("#letter_header").val();
            $("#result1").html('Loading....').load(loadUrl+"/"+name);
        })			
    })
</script> 
<script type="text/javascript" charset="utf-8"> 
    $(document).ready(function() {
        var loadUrl='<?php echo site_url('organization/info/footer_view'); ?>';
        $("select#letter_footer").change(function(){
            var name=$("#letter_footer").val();
            $("#result2").html('Loading....').load(loadUrl+"/"+name);
        })			
    })
</script> 	

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<p style="padding:0px; margin:0px; width:900px; text-align:right">
    <a class="" href="<?php echo base_url(); ?>organization/letter/add_header">
        <button>Create header</button> </a>
    <a class="" href="<?php echo base_url(); ?>organization/letter/add_footer">
        <button>Create footer</button> </a>
    <a class="" href="<?php echo base_url(); ?>organization/info/add_external_letter">
        <button>Create External Letter</button> </a>
</p>
<?php echo form_open("organization/info/added_letter"); ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="infobox" style="width: 900px; margin-bottom: 20px; font-size: 12px; -moz-border-radius: 8px 8px 8px 8px;">
    <div class="infobox_left" style="width: 900px;">
        <table width="900" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">

            <tbody>
                <tr>
                    <?php $query = $this->db->query("select * from letter_header where org_id='" . $this->session->userdata('user_id') . "'and member_id=0"); ?>
                    <td width="10%"><font class="inside">Letter Header </font></td>
                    <td width="45%">
                        <select id="letter_header" name="letter_header" style="width:190px">
                            <option value="">Select</option>
                            <?php foreach ($query->result() as $info): ?>
                                <option value="<?php echo $info->id; ?>"><?php echo $info->title; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <span class="markcolor"><?php echo ucwords(form_error('letter_header')); ?></span>
                    </td>

                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result1"></div>
                    </td>
                </tr>
                <tr>
                    <td width="10%"><font class="inside">Letter Title </font></td>
                    <td width="45%">
                        <textarea rows="5" name="letter_title" cols="60" style="background: none repeat scroll 0 0 #CCCCCC;"></textarea>
<!--                        <input name="letter_title" style="width:200px" class="" type="text">
                        --><span class="markcolor"><?php echo ucwords(form_error('letter_title')); ?></span>
                    </td>

                </tr>
                <tr>
                    <td width="10%"><font class="inside">Letter Text </font></td>
                    <td width="45%">
                       <!-- <input name="letter_text" style="width:200px" class="" type="text">-->
                        <textarea rows="5" name="letter_text" cols="60" style="background: none repeat scroll 0 0 #CCCCCC;"></textarea>

                        <span class="markcolor"><?php echo ucwords(form_error('letter_text')); ?></span>
                    </td>

                </tr>
                <tr>
                    <?php $query1 = $this->db->query("select * from letter_footer where org_id='" . $this->session->userdata('user_id') . "'and member_id=0"); ?>
                    <td width="10%"><font class="inside">Letter Footer </font></td>
                    <td width="45%">
                        <select name="letter_footer" id="letter_footer" style="width:190px">
                            <option value="">Select</option>
                            <?php foreach ($query1->result() as $info1): ?>
                                <option value="<?php echo $info1->id; ?>"><?php echo $info1->title; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <span class="markcolor"><?php echo ucwords(form_error('letter_footer')); ?></span>
                    </td>

                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="45%">
                        <div id="result2"></div>
                    </td>
                </tr> 

                <tr>
                    <td width="10%"><font class="inside"> Send to: </font></td>
                    <td width="45%">
                        All:<input type="checkbox" onClick="checkAll(this)">
                    </td>

                </tr>
            </tbody></table> 

        <div style="width:800px; float:left; margin-left:120px">

            <ul>
                <?php $q = $this->db->query("select * from member where org_id='" . $this->session->userdata('user_id') . "'"); ?>
                <?php foreach ($q->result() as $p): ?>
                    <li style="width:200px; float:left; position:relative">
                        <span style="width:130px; float:left; position:relative; left:7px"> <?php echo $p->name; ?></span>
                        <span style="width:20px; float:left; position:relative"> <input id="a" type="checkbox"  name="checkbox[]"  value="<?php echo $p->id; ?>" /></span>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        </table>

        <table width="500" cellspacing="1" align="center" cellpadding="2" border="0" id="theBody" style="margin-left:40px; margin-top:10px">
            <tbody>
                <tr>
                    <td width="45%">
                        <input type="submit" value="Send" style="width:100px; color:black; font-size:13px" />

                    </td>
                    <td width="33%">

                    </td>
                </tr>

            </tbody></table>

    </div>
    <?php echo form_close(); ?>


<!--<script type="text/javascript" src="/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    -->
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            // Theme options
            theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "",//"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 :"", //"insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Skin options
            skin : "o2k7",
            skin_variant : "silver",

            // Example content CSS (should be your site CSS)
            content_css : "css/example.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "",
                staffid : ""
            }
        });
    </script>

    <!--<script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",//advlink,emotions,
            elements : "",
            relative_urls : false,
            width : "50%",
            height : "100px",	
            // Theme options
            theme_advanced_buttons1 : "fontselect,fontsizeselect,forecolor,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,|,link,unlink,|,image,media,|,bullist,numlist,|,outdent,indent,|,fullscreen",//strikethrough,|,formatselect,fontselect,fontsizeselect,|,image
            theme_advanced_buttons1 : "fontselect,fontsizeselect,forecolor,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,|,link,unlink,|,bullist,numlist",//strikethrough,|,formatselect,fontselect,fontsizeselect,|,image
            theme_advanced_buttons2 : '',//,bullist,numlist,|,outdent,indent,|
            theme_advanced_buttons3 : "forecolor,backcolor,|,charmap,emotions,media,advhr",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : false,
            theme_advanced_path : false,
            // Example word content CSS (should be your site CSS) this one removes paragraph margins
            content_css : "",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url  : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "",
                staffid : ""
            }
        });
    </script>


    -->