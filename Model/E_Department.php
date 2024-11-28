<?php
class Entity_Department
{
    public $IDPB;
    public $TenPB;
    public $Mota;

    public function __construct($IDPB, $TenPB,$Mota)
    {

        $this->IDPB = $IDPB;
        $this->TenPB = $TenPB;
        $this->Mota = $Mota;
    }
}
