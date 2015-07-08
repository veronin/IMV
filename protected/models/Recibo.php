<?php
/*@var $this Recibo */   
class Recibo extends BaseRecibo
{
   public function getName()
        {
                return $this->idCuenta0->idCliente0->idPersona0->getFullName();
        }
}
