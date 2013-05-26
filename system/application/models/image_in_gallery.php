<?php
    class Image_in_gallery extends Model {
        var $id;
        var $image_gallery_id;
        var $image_id;
        var $idx;

        function Image_in_gallery() {
            parent::Model();
        }

        function get($id) {
            $query = $this->db->get_where('Image_in_gallery', array('id' => $id));
            $res = $query->result();
            foreach ($res as $row) {
                return $row;
            }
            return null;
        }

        function row_count() {
            return $this->db->count_all('Image_in_gallery');
        }

        function get_list($limit, $offset) {
            $query = $this->db->get('Image_in_gallery', $limit, $offset);
            return $query->result();
        }

        function insert_entry($image_gallery_id, $image_id) {
            $this->data->image_gallery_id  = $image_gallery_id;
            $this->data->image_id  = $image_id;

            $this->db->insert('Image_in_gallery', $this->data);
        }

        function delete_entry($id) {
            $this->db->delete('Image_in_gallery', array('id' => $id));
        }
    }
?>