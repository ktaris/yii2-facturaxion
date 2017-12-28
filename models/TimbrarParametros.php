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
class TimbrarParametros extends Model
{
    /**
     * ENTRADAS DEL WS.
     */
    public $Usuario;
    public $Contrasenia;
    public $XMLPreCFDI;
    public $XMLOpcionales;
    public $IdAddenda;
    public $NodoAddenda;
    public $IdLlaveUnico;
    public $UUIDSucursal;
    public $Mail;
    public $MailCC;
    public $MailCCO;
    /**
     * SALIDAS DEL WS.
     */
    public $TimbrarParametrosResult;
    public $XMLCFDI;
    public $FolioFiscal;
    public $RutaPDF;
    public $Validacion3B;
    public $Sugerencias3B;
    public $IdValidacion;
    public $MensajeValidacion;

    public function rules()
    {
        return [
            [['XMLOpcionales', 'IdAddenda', 'NodoAddenda', 'Mail', 'MailCC', 'MailCCO', 'UUIDSucursal', 'IdLlaveUnico'], 'default', 'value' => ''],
            [['Usuario', 'Contrasenia'], 'required'],
            [['TimbrarParametrosResult', 'XMLCFDI', 'FolioFiscal', 'RutaPDF', 'Validacion3B', 'Sugerencias3B', 'IdValidacion', 'MensajeValidacion'], 'safe'],
        ];
    }
}
