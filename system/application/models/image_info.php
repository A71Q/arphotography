<?php
    class Image_info extends Model {
        var $id;
        var $upload_date;
        var $orig_name;
        var $raw_name;
        var $file_ext;
        var $size;
        var $width;
        var $height;
        var $title;
        var $description;

        function Image_info() {
            parent::Model();
        }

        function get($id) {
            $query = $this->db->get_where('image_info', array('id' => $id));
            $res = $query->result();
            foreach ($res as $row) {
                return $row;
            }
            return null;
        }

        function row_count() {
            return $this->db->count_all('image_info');
        }

        function get_list($limit, $offset) {
            $query = $this->db->get('image_info', $limit, $offset);
            return $query->result();
        }

        function get_recent_list($limit) {
            $this->db->order_by("id", "desc");
            $query =   $query = $this->db->get('image_info', $limit, 0);

            return $query->result();
        }

        function insert_entry($data) {
            $this->data->upload_date  = date("YmdHis");
            $this->data->orig_name  = $data['orig_name'];
            $this->data->raw_name  = $data['raw_name'];
            $this->data->file_ext  = $data['file_ext'];
            $this->data->size  = $data['file_size'];
            $this->data->width  = $data['image_width'];
            $this->data->height  = $data['image_height'];

            $this->db->insert('image_info', $this->data);
        }

        function set_title_desc($image_id, $image_title, $image_description) {
            $this->data->title = $image_title;
            $this->data->description = $image_description;
            $this->db->update('image_info', $this->data, array('id' => $image_id) );
        }
        function delete_entry($id) {
            $this->db->delete('image_info', array('id' => $id));
        }
    }
?>