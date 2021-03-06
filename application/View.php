<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class View 
{
    private $_request;
    private $_controlador;
    private $_js;
    private $_rutas;
    
    public function View(Request $peticion) { //$peticion es un objeto de Request
        $this->_request = $peticion;
        //$this->_controlador= $peticion->getControlador();
        $this->_js=array();
        $this->_rutas = array();
        
        $modulo = $this->_request->getModulo();
        $controlador= $this->_request->getControlador();
        
        if($modulo) {
            $this->_rutas['view'] = ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS; 
            $this->_rutas['js'] = BASE_URL . 'modules/' . $modulo . '/views/' . $controlador . '/js/'; 
        } else {
            $this->_rutas['view'] = ROOT . 'views' . DS . $controlador . DS; 
            $this->_rutas['js'] = BASE_URL . 'views/' . $controlador . '/js/'; 
        }
    }
    
    
    public function renderingMain($vista)
    {       
        $_layoutParams= array(
            'ruta_css' => BASE_URL . 'public/css/', 
            'ruta_img' => BASE_URL . 'public/img/', 
            'ruta_js' => BASE_URL . 'public/js/'
        );
        
        $rutaView= $this->_rutas['view'] . $vista . '.phtml';
        if(is_readable($rutaView))
        {   
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        }
        else
        {
            throw new Exception('Error de vista: '.$rutaView);
        }
    }


    
}