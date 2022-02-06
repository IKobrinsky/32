<?php
class Role
{
    public  $CanViewPicture;
    public  $CanViewSecretPage;
    public $id;
    public function __construct($userId)
    {
        $id = $userId;
        $this->CanViewSecretPage=false;
        $this->CanViewPicture=false;
    }
}


class SimpleUser extends Role
{
    public function __construct($userId)
    {
        parent::__construct($userId);
        $this->CanViewSecretPage=true;
        $this->CanViewPicture=false;
    }
}

class VKUser extends Role
{
    public function __construct($userId)
    {
        parent::__construct($userId);
        $this->CanViewSecretPage=true;
        $this->CanViewPicture=true;
    }
}

?>