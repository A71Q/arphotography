<?php
    class Image_gallery extends Model {
        var $id;
        var $name;
        var $description;
        var $create_date;
        var $update_date;
        var $cover_image;

        function Image_gallery() {
            parent::Model();
        }

        function get($id) {
            $query = $this->db->get_where('image_gallery', array('id' => $id));
            $res = $query->result();
            foreach ($res as $row) {
                return $row;
            }
            return null;
        }

        function row_count() {
            return $this->db->count_all('image_gallery');
        }

        function get_list($limit, $offset) {
            $query = $this->db->get('image_gallery', $limit, $offset);
            return $query->result();
        }

        function insert_entry($data) {
            $this->data->create_date  = date("YmdHis");
            $this->data->name  = $data['name'];
            $this->data->description  = $data['description'];

            $this->db->insert('image_gallery', $this->data);
        }

        function delete_entry($id) {
            $this->db->delete('image_gellery', array('id' => $id));
        }
    }
?>