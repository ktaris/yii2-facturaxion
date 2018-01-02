<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\facturaxion\models;

use yii\base\Model;

/**
 * Clase para crear un sobre para enviar a timbrar un pre-cfdi a Facturaxión.
 *
 * Esta clase se realizó en base al documento DOC-DES-6 v1.1 de Facturaxión.
 *
 * @author Carlos Ramos <carlos@ktaris.com>
 *
 * @link http://www.ktaris.com/
 */
class CancelarParametros extends Model
{
    /**
     * ENTRADAS DEL WS.
     */
    public $Usuario;
    public $Contrasenia;
    public $RFCEmisor;
    public $FolioFiscal;
    /**
     * SALIDAS DEL WS.
     */
    public $CancelarParametrosResult;
    public $EstatusRespuesta;
    public $IdValidacion;
    public $MensajeValidacion;

    public function rules()
    {
        return [
            [['RFCEmisor', 'FolioFiscal'], 'default', 'value' => ''],
            [['Usuario', 'Contrasenia'], 'required'],
            [['CancelarParametrosResult', 'EstatusRespuesta', 'IdValidacion', 'MensajeValidacion'], 'safe'],
        ];
    }
}
