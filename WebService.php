<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\facturaxion;

/**
 * Clase para conexión con el servicio de Facturaxión.
 *
 * Esta clase se realizó en base al documento DOC-DES-6 v1.1 de Facturaxión.
 *
 * @author Carlos Ramos <carlos@ktaris.com>
 *
 * @link http://www.ktaris.com/
 */
class WebService
{
    /**
     * @var string URL del servicio web de prueba de Facturaxión.
     */
    protected $_ws_url_prueba = 'https://wstimbradopruebas.facturaxion.com/WSTimbrado.svc?wsdl';
    /**
     * @var string URL del servicio web de Facturaxión (de producción).
     */
    protected $_ws_url_produccion = 'https://wstimbrado.facturaxion.com/WSTimbrado.svc?wsdl';
    /**
     * @var SoapClient Cliente de servicio web de Facturaxión.
     */
    protected $_cliente;

    // ==================================================================
    //
    // Lógica interna.
    //
    // ------------------------------------------------------------------

    /**
     * Determina cuál URL se utilizará para llamar a Facturaxión en base
     * a la bandera modoPrueba.
     * @param boolean $modoPrueba determina si se utiliza el servicio de pruebas.
     */
    public function __construct($modoPrueba = false)
    {
        if ($modoPrueba == true) {
            $this->_cliente = new \SoapClient($this->_ws_url_prueba, ['encoding' => 'UTF-8']);
        } else {
            $this->_cliente = new \SoapClient($this->_ws_url_produccion, ['encoding' => 'UTF-8']);
        }
    }

    /**
     * Recibe un modelo que representar un objeto ante Facturaxión, como
     * {@link TimbrarParametros}, y le asigna los datos recibidos por el servicio web.
     *
     * @param  mixed    $objeto       objeto enviado a FX.
     * @param  stdClass $resultado_ws objeto con los datos recibidos por FX.
     */
    protected function vaciarDatosAObjeto($objeto, $resultado_ws)
    {
        $datosArreglo = json_decode(json_encode($resultado_ws), true);

        $objeto->attributes = $datosArreglo;
    }

    // ==================================================================
    //
    // Servicios expuestos por Facturaxión.
    //
    // ------------------------------------------------------------------

    /**
     * Manda a llamar el método TimbrarParametros de Facturaxión.
     *
     * @param {link TimbrarParametros} $obj objeto con los datos para la petición.
     */
    public function TimbrarParametros($obj)
    {
        $resultado_ws = $this->_cliente->TimbrarParametros($obj);

        $this->vaciarDatosAObjeto($obj, $resultado_ws);

        return $resultado_ws;
    }
}
