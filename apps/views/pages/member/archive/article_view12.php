<h3 class="content_edit">Member Control Panel  View Archive article
    <div style="width:280px; float:right; padding-top:5px; padding-left:10px; color:green; font-size:18px;">
        <?php echo form_open("org_member/letter/view_archive_article_sort1"); ?>
        <?php $query = $this->db->query("select * from article_category where org_id='" . $this->session->userdata("member_org") . "'"); ?>
        <span style="font-size:10px; color:black">Category </span> 
        <select name="article_category" class="t">
            <?php foreach ($query->result() as $info): ?>
                <option value="<?php echo $info->id; ?>"><?php echo $info->category_name; ?></option>
            <?php endforeach; ?>
        </select>
        <span style="font-size:10px; color:black">Type </span> <select name="article_type" class="t">
            <option value="2">Importance</option>
            <option value="3">Date</option>
        </select>

        <input type="submit" value="go" style=" font-size:9px; font-weight:bold"/>
        <?php echo form_close(); ?>
    </div>

</h3>

<style>
    .t{ background: none repeat scroll 0 0 #CCCCCC;
        color: #333333;
        font-family: Arial,Helvetica;
        font-size: x-small;}
    .SearchListing{
        border-bottom: 1px solid #C4C4C4;
        border-left: 1px solid #C4C4C4;
        border-right: 1px solid #C4C4C4;
        border-top: 1px solid #C4C4C4;
        margin-bottom:15px; 
        margin-top:20px;
        -moz-border-radius: 15px 15px 15px 15px;
    }
    .SearchListing p{ padding-left:10px; text-align:left}
    .SearchListing form{ padding-left:10px; margin-bottom:10px; text-align:left}
    .delete a{ color:#990033}
</style>
<style>
    .forum_comment {
        -moz-border-radius: 3px 3px 3px 3px;
        border: 1px solid #C4C4C4;
        font-size: 13px;
        margin-top:20px;
        width:850px;
        text-align:justify;
        max-height: 100px;
        overflow:hidden;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }
    .forum_comment3 {
        -moz-border-radius: 3px 3px 3px 3px;
        font-size: 15px;
        font-weight:bold;
        margin-top:30px;
        width:850px;
        text-align:justify;
        max-height: 100px;
        color:#7392D3;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }
    .forum_comment9 {

        font-size: 13px;
        text-align:justify;
        color:#7392D3;
        padding: 10px;
        position: relative;
        white-space: nowrap;
    }

    .forum_comment1 {
        -moz-border-radius: 3px 3px 3px 3px;
        border: 1px solid rgba(0, 0, 0, 0.15);
        font-size: 13px;
        margin: 0 0 1em;
        overflow: hidden;
        padding: 5px;
        position: relative;
        white-space: nowrap;
    }
    .a{
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        line-height: 2.4;
        margin: 2px 2px 2px 0;
        padding: 3px 4px;
        height:30px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c{
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        height:20px;
        text-decoration: none;
        white-space: nowrap;
    }
    .c:hover{
        background-color: #DB9148;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;   
        text-decoration: none;
        white-space: nowrap;
    }
    .a:hover{
        background-color: #DB9148;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #3E6D8E;
        font-size: 90%;
        line-height: 2.4;
        margin: 2px 2px 2px 0;
        padding: 3px 4px;
        text-decoration: none;
        white-space: nowrap;
    }

    .dsq-button {
        -moz-border-radius: 0 0 4px 0;
        -moz-box-shadow: 0 1px 2px rgba(72, 76, 80, 0.25);

        border: 1px solid #ACB2B8;
        color: #585C60;
        font-size: 12px;
        font-weight: 600;
        height: 34px;
        line-height: 14px;
        margin: 0;
        padding: 8px 20px;
        position: absolute;
        right: -1px;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.9);
        top: -1px;
        z-index: 2;
    }
    #r{

        border-bottom: 1px dotted #999999;
        float: left;
        overflow: hidden;
        width: 730px;


    }


    .a {
        background-color: #E0EAF1;
        border-bottom: 1px solid #3E6D8E;
        border-right: 1px solid #7F9FB6;
        color: #green;
        font-size: 90%;
        height: 30px;
        line-height: 2.4;

        text-decoration: none;
        white-space: nowrap;
    }
</style>
<script>
    function check_value()
    {
        var myvar = document.getElementById("comment").value;
        if(myvar)
        {
            $("#a").show();
        }
        else
        {
            $("#a").hide();
        }
    }
</script>
<?php
$query8 = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
foreach ($query8->result() as $info8):
endforeach;
if ($info8->mainboard_manually_archive == '1'):
    ?>
    <?php
    echo $this->session->flashdata('message');
    $i = 1;
    foreach ($query1 as $post_info):
        //if (date("Y-m-d") < $post_info->expire_date):
        if ($i % 2 == 0): $color = "#F1FAFA";
        else : $color = "#F1FAFA";
        endif;
        $name = "";
        $query85 = $this->db->query("select name from member where id='" . $post_info->member_id . "'");
        foreach ($query85->result() as $m_name):
            $name = $m_name->name;
        endforeach;
        $category_name = "";
        $query850 = $this->db->query("select category_name from article_category where id='" . $post_info->article_category . "'");
        foreach ($query850->result() as $c_info):
            $category_name = $c_info->category_name;
        endforeach;
        ?>
        <div id="r" style="padding-left:50px; font-size:16px; padding-bottom:7px; margin-bottom:15px;  font-weight:bold">
            <span style="color:#0077D6" >


                <a href="<?php echo base_url(); ?>org_member/info/view_mainboard_post_detail12/<?php echo $post_info->post_id; ?>">
                    <?php echo $post_info->title; ?></a>
                <span><br />
                    <p> <?php echo $post_info->heading; ?></p>

                    <span><br />
                        <span style="color:black; font-size:12px" > <?php echo substr("$post_info->text", 0, 50); ?><span><br />
                                <span style="padding-left:100px; font-size:10px">
                                    <span style="color:#689102; font-size:9px" >
                                        <b>Posted By:</b> 
                                        <a  href="<?php echo base_url() ?>org_member/info/view_member_profile/<?php echo $post_info->member_id; ?>" title="">
                                            <?php echo $name; ?>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;<b>Expire Date:</b> <?php echo $post_info->expire_date; ?>
                                        &nbsp;&nbsp;&nbsp; <b>Importance:</b> <?php echo $post_info->importance; ?>
                                        &nbsp;&nbsp;&nbsp; <b>Category:</b> <?php echo $category_name; ?>

                                    </span>
                                    <span id="n" style="float:right; padding-left:20px; width:300px;">



                                    </span>
                                    </div>


                                    <?php
                                    //endif;

                                    $i = $i + 1;
                                endforeach;
                                ?>
                                <p  class="pagination" style="width:900px; clear:both; text-align:center"><?php echo $this->pagination->create_links(); ?></p>
                               

                            <?php endif; ?>








