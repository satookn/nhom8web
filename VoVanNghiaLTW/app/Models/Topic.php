<?php
namespace App\Models;
use App\Library\Database;

class Topic extends Database
{
    private $table = null;
    public function __construct()
    {
       parent:: __construct();
       $this->table = $this->TableName('topic');//vvn_topic
    }
    // lấy danh sách topic
    public function topic_list($args=array())
    {
        $strwhere= '';
        if(array_key_exists('status',$args))
        {
            if($args['status']=='index')
            {
                 $strwhere.="status!='0'";
            }
            else
            {
                $strwhere.="status='".$args['status']."'";

            }
        
           
        }
        //kiểm tra biến strwhere
        if($strwhere!='')
        {
            $strwhere="WHERE " .$strwhere;
        }
        $sql=" SELECT * FROM $this->table $strwhere";
        
        return $this->QueryAll($sql);
        
    }
    //lấy ra 1 mẫu tin - sau này sửa lại
    public function topic_row($id)
    {
        $sql=" SELECT * FROM $this->table WHERE id ='$id'";
        return $this->QueryOne($sql);
    }
      //update mẫu tin 
    public function topic_update($data,$id)
    {
        $strset = '';
        foreach($data as $f=>$v)
        {
            $strset.=$f."='$v', ";
        }
        $strset = rtrim(rtrim($strset),',');
        $sql="UPDATE $this->table SET $strset WHERE id='$id'";
        $this->SetQuery($sql);
    }

        //xóa mẫu tin vĩnh viễn
    public function topic_delete($id)
    {
       
        $sql="DELETE FROM  $this->table WHERE id='$id'";
        $this->SetQuery($sql);
    }
}

?>