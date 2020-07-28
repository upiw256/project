<?php

use CodeIgniter\Model;

class M_kepsek extends Model
{
  protected $table      = 'kepsek';
  protected $primaryKey = 'id_kepsek';

  public function getKepsek()
  {
    $data = $this->db->table('post')->select('*')->join('kepsek', 'kepsek.id_kepsek = post.id_post')->get();
    // $data = $this->db->query("SELECT * FROM post INNER JOIN kepsek ON post.id_kepsek = kepsek.id_kepsek");
    return $data;
  }
}
