<?php

class Info_model extends Model {

    function Info_model() {
        parent::Model();
        $this->load->helper('url');
    }

    function org_group_insert($data) {
        $this->db->insert('org_group', $data);
    }

    function user_type_insert($data) {
        $this->db->insert('user_type', $data);
    }

    function get_existing_permission($g_name) {
        $query = $this->db->query("select * from group_permission where group_id='" . $g_name . "'");
        return $query->result();
    }

    function group_permission_insert($data) {
        $this->db->insert('group_permission', $data);
    }

    function get_org_profile() {
        $query = $this->db->query("select * from user_info where id='" . $this->session->userdata('user_id') . "'");
        return $query->result();
    }

    function profile_update($data) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user_info', $data);
    }

    function get_all_cost($org_id) {
        $query = $this->db->query("select * from org_cost where org_id='" . $org_id . "'");
        return $query->result();
    }

    function view_org_group1($org_id) {
        $query = $this->db->query("select * from org_group where org_id='" . $org_id . "'");
        return $query->result();
    }

    function view_user_type($org_id) {
        $query = $this->db->query("select * from user_type where org_id='" . $org_id . "'");
        return $query->result();
    }

    function cost_insert($data) {
        $this->db->insert('org_cost', $data);
    }

    function get_org_group($id) {
        $query = $this->db->get_where('org_group', array('id' => $id));
        return $query->result();
    }

    function get_user_info($id) {
        $query = $this->db->get_where('member', array('id' => $id));
        return $query->result();
    }

    function view_cost($org_id) {
        $query = $this->db->query("select * from org_cost where org_id='" . $org_id . "'");
        return $query->result();
    }

    function cost_delete($id) {
        $this->db->delete('org_cost', array('id' => $id));
    }

    function cost_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('org_cost', $data);
    }

    function get_cost($id) {
        $query = $this->db->get_where('org_cost', array('id' => $id));
        return $query->result();
    }

    function view_member_profile_seeting($id) {
        $query = $this->db->get_where('member_info_previlize_org', array('member_id' => $id));
        return $query->result();
    }

    function view_member_profile_seeting1($id) {
        $query = $this->db->get_where('member_info_previlize', array('member_id' => $id));
        return $query->result();
    }

    function view_group_permission($org_id) {

        $query = $this->db->query("select * from group_permission where org_id='" . $org_id . "'");
        return $query->result();
    }

    function profile_seeting_insert($data) {
        $this->db->insert('member_info_previlize_org', $data);
    }

    function profile_seeting_update($data, $id) {
        $this->db->where('member_id', $id);
        $this->db->update('member_info_previlize_org', $data);
    }

    function profile_seeting_update1($profile_data, $id) {
        $this->db->where('member_id', $id);
        $this->db->update('member_info_previlize', $profile_data);
    }

    function get_group_info($id) {
        $query = $this->db->query("select * from group_permission where group_id='" . $id . "'");
        return $query->result();
    }

    function group_permission_update($data) {
        $this->db->where('group_id', $this->input->post('group_name'));
        $this->db->update('group_permission', $data);
    }

    function get_existing_username($u_name) {
        $query = $this->db->query("select username from member where username='" . $u_name . "'");
        return $query->result();
    }

    function member_registration($data) {
        $this->db->insert('member', $data);
    }

    function previlige_insert($data) {
        $this->db->insert('member_previlige', $data);
    }

    function previlige_update($data1) {
        $this->db->where('id', $this->input->post('member_id'));
        $this->db->update('member', $data1);
    }

    function pget_reg_member() {

        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from member where org_id='" . $org_id . "'");
        return $query->result();
    }

    function get_reg_member($start=0, $perPage=0) {
        $this->_table = 'member';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id ', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $this->db->where('org_id ', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function org_group_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('org_group', $data);
    }

    function org_group_delete($id) {
        $this->db->delete('org_group', array('id' => $id));
    }

    function org_profile_update($data) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user_info', $data);
    }

    function org_type_insert($data1) {
        $this->db->insert('org_type', $data1);
    }

    function approve_member_post_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('member_post', $data);
    }

    function approve_member_letter_update($data, $letter_id) {
        $this->db->where('id', $letter_id);
        $this->db->update('letter', $data);
    }

    function approve_member_post1_update($data1, $post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->update('post_tbl', $data1);
    }

    function approve_member_letter1_update($data1, $letter_id) {
        $this->db->where('letter_id', $letter_id);
        $this->db->update('letter_send_request', $data1);
    }

    function approve_total_letter_update($data5, $letter_id) {
        $this->db->where('letter_id', $letter_id);
        $this->db->update('total_letter', $data5);
    }

    function deny_total_letter_update($data5, $post_id) {
        $this->db->where('letter_id', $post_id);
        $this->db->update('total_letter', $data5);
    }

    function deny_member_post_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('member_post', $data);
    }

    function deny_member_letter_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('letter', $data);
    }

    function get_user_type($id) {
        $query = $this->db->get_where('user_type', array('id' => $id));
        return $query->result();
    }

    function get_all_address($id) {
        $query = $this->db->get_where('address_list', array('id' => $id));
        return $query->result();
    }

    function user_type_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_type', $data);
    }

    function address_list_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('address_list', $data);
    }

    function user_type_delete($id) {
        $this->db->delete('user_type', array('id' => $id));
    }

    function delete_forum_post($id) {
        $this->db->delete('forum_comment', array('id' => $id));
    }

    function address_delete($id) {
        $this->db->delete('address_list', array('id' => $id));
    }

    function archive_forum_comments_insert($data) {
        $this->db->insert('forum_archive', $data);
    }

    function delete_archive_comment($id) {
        $this->db->delete('forum_comment', array('id' => $id));
    }

    function previlige_usertype_update($data) {
        $this->db->where('user_type', $this->input->post('user_type'));
        $this->db->update('member_previlige', $data);
    }

    function letter_insert($data) {
        $this->db->insert('letter', $data);
    }

    function letter_request_insert($data1) {
        $this->db->insert('letter_send_request', $data1);
    }

    function article_archive_insert($data1) {
        $this->db->insert('archive_article', $data1);
    }

    function delete_article($article_id) {
        $this->db->delete('member_post', array('id' => $article_id));
    }

    function password_update($data) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user_info', $data);
    }

    function view_comment($start=0, $perPage=0) {
        $this->_table = 'forum_archive';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_article($start=0, $perPage=0) {
        $this->_table = 'archive_article';
        $a_type = 1;
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('article_type', $a_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_article1($start=0, $perPage=0) {
        $this->_table = 'archive_article';
        $a_type = 2;
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('article_type', $a_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_article_sort($start=0, $perPage=0, $id, $category) {
        $this->_table = 'archive_article';
        $a_type = 1;
        if ($start >= 0 AND $perPage > 0) {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_article_sort1($start=0, $perPage=0, $id, $category) {
        $this->_table = 'archive_article';
        $a_type = 2;
        if ($start >= 0 AND $perPage > 0) {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function previlige_external_insert($data) {
        $this->db->insert('org_external_previlige', $data);
    }

    function previlige_external_update($data) {
        $this->db->where('org_id', $this->session->userdata('user_id'));
        $this->db->update('org_external_previlige', $data);
    }

    function user_profile_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function org_group_permission_delete($id) {
        $this->db->delete('group_permission', array('group_id' => $id));
    }

    function address_list_insert($data) {
        $this->db->insert('address_list', $data);
    }

    function view_address_list() {
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from address_list where org_id='" . $org_id . "'");
        return $query->result();
    }

    function total_letter_insert($data2) {
        $this->db->insert('total_letter', $data2);
    }

    function get_member_info($id) {
        $query = $this->db->get_where('member', array('id' => $id));
        return $query->result();
    }

    function get_member_admin_previlize($id) {

        $query = $this->db->get_where('org_member', array('member_id' => $id));
        return $query->result();
    }

    function delete_member_admin_previlize($id) {
        $this->db->delete('org_member', array('member_id' => $id));
    }

    function admin_previlize_insert($data) {
        $this->db->insert('org_member', $data);
    }

    function get_group_member($group_id) {
        $query = $this->db->get_where('member', array('member_group' => $group_id));
        return $query->result();
    }

    function view_mainboard_article($start=0, $perPage=0) {
        $s = "2";
        $this->_table = 'member_post';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_forum_post($start=0, $perPage=0) {
        $this->_table = 'forum';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function profile_setting_update_public($public_data, $id) {
        $this->db->where('member_id', $id);
        $this->db->update('member_info_previlize', $public_data);
    }

    function view_org_profile_seeting($org_id) {
        $query = $this->db->get_where('org_profile_previlize', array('org_id' => $org_id));
        return $query->result();
    }

    function org_profile_setting_update($data, $org_id) {
        $this->db->where('org_id', $org_id);
        $this->db->update('org_profile_previlize', $data);
    }

    function org_profile_setting_insert($data) {
        $this->db->insert('org_profile_previlize', $data);
    }

    function view_message($start=0, $perPage=0) {
        $this->_table = 'contact_info';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('flag', 1);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('flag', 1);

            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function delete_message($id) {
        $this->db->delete('contact_info', array('id' => $id));
    }

    function get_message_detail($id) {
        $query = $this->db->get_where('contact_info', array('id' => $id));
        return $query->result();
    }

    function read_status_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('contact_info', $data);
    }

    function get_expire_article() {
        $current_date = date("Y-m-d");
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from member_post where org_id='" . $org_id . "'and expire_date<'" . $current_date . "'");
        return $query->result();
    }

    function message_insert($data) {
        $this->db->insert('contact_info', $data);
    }

    function article_category_insert($data) {
        $this->db->insert('article_category', $data);
    }

    function view_article_category() {
        $query = $this->db->query("select * from article_category where org_id='" . $this->session->userdata("user_id") . "'");
        return $query->result();
    }

    function get_category($id) {
        $query = $this->db->get_where('article_category', array('id' => $id));
        return $query->result();
    }

    function article_categpry_update($profile_data) {
        $this->db->where('id', $this->input->post("id"));
        $this->db->update('article_category', $profile_data);
    }

    function view_mainboard($start=0, $perPage=0, $article_category) {
        $s = "2";
        $this->_table = 'member_post';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $this->db->where('article_category', $article_category);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $this->db->where('article_category', $article_category);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_setting($id) {
        $query = $this->db->query("select * from member_common_profile where org_id='" . $id . "'");
        return $query->result();
    }

    function setting_update($data) {
        $this->db->where('org_id', $this->session->userdata("user_id"));
        $this->db->update('member_common_profile', $profile_data);
    }

    function setting_insert($data) {
        $this->db->insert('member_common_profile', $data);
    }

}

