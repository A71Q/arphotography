<?php
    class Login extends Model {
        var $id;
        var $login_name;
        var $password;
        var $login_type;
        var $first_name;
        var $last_name;
        var $title;
        function Login() {
            parent::Model();
        }

        function getLoginForLoginName($login) {
            $query = $this->db->get_where('login', array('login_name' => $login), 1);
            $res = $query->result();
            foreach ($res as $row) {
                return $row;
            }
            return null;
        }

        function getLogin($login, $pass) {
            $query = $this->db->get_where('login', array('login_name' => $login, 'password' => $pass), 1);
            $res = $query->result();
            foreach ($res as $row) {
                return $row;
            }
            return null;
        }

        function get($id) {
            $query = $this->db->get_where('login', array('id' => $id));
            $res = $query->result();
            foreach ($res as $row) {
                return $row;
            }
            return new Login();
        }

        function row_count() {
            return $this->db->count_all('login');
        }

        function get_list($limit, $offset) {
            $query = $this->db->get('login', $limit, $offset);
            return $query->result();
        }

        function get_list_as_array($limit, $offset) {
            $list = $this->get_list($limit, $offset);
            return $this->convert_to_array($list);
        }

        function search_row_count($keyword) {
            $this->db->like('search_data', $keyword);
            $this->db->from('login');
            return $this->db->count_all_results();
        }

        function search_list($keyword, $limit, $offset) {
            $this->db->like('search_data', $keyword);
            $query = $this->db->get('login', $limit, $offset);
            return $query->result();
        }

        function search_list_as_array($keyword, $limit, $offset) {
            $list = $this->search_list($keyword, $limit, $offset);
            return $this->convert_to_array($list);
        }

         function convert_to_array($list) {
            $arr[0] = array('User Name', 'First Name', 'Last Name', 'Title', 'User Type');
            $i = 1;
            foreach ($list as $row) {
                $arr[$i++] = array(
                    '<a class="activation" href="/arp/index.php/crudcontroller/userLoad/' . $row->id . '">' . htmlentities($row->login_name) . '</a>',
                    htmlentities($row->first_name), htmlentities($row->last_name), htmlentities($row->title), $row->login_type);
            }
            return $arr;
         }

        function insert_entry() {
            $this->data->login_name  = $this->input->post('login_name');
            $this->data->password = $this->input->post('password');
            $this->data->login_type = $this->input->post('login_type');
            $this->data->first_name = $this->input->post('first_name');
            $this->data->last_name = $this->input->post('last_name');
            $this->data->title = $this->input->post('title');
            $this->data->search_data = $this->login_name . $this->first_name . $this->last_name . $this->title;
            $this->db->insert('login', $this->data);
        }

        function update_entry() {
            $this->data->id = $this->input->post('id');
            $this->data->login_name  = $this->input->post('login_name');
            if($this->input->post('password') != '') {
                $this->data->password = $this->input->post('password');
            } else {
                unset($this->data->password);
            }
            $this->data->login_type = $this->input->post('login_type');
            $this->data->first_name = $this->input->post('first_name');
            $this->data->last_name = $this->input->post('last_name');
            $this->data->title = $this->input->post('title');
            $this->data->search_data = $this->login_name . $this->first_name . $this->last_name . $this->title . $this->login_type;
            $this->db->update('login', $this->data, array('id' => $this->input->post('id')) );
        }

        function delete_entry($id) {
            $this->db->delete('login', array('id' => $id));
        }
    }
?>