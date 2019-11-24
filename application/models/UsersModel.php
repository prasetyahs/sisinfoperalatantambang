
<?php 


class UsersModel extends CI_Model
{
    public function insertUsers($data)
    {
        return $this->db->insert("tb_users",$data);
    }
}
