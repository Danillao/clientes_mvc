<?php

class Controller
{
    /** 
     * Recupera o Template que chama as Views
     * Passa os Parametros para o Template
     * 
     * @param String $viewName
     * @param Array $viewData
     * @return @void
     */
    public function loadTemplate($viewName, $viewData = array())
    {
        require 'views/template.php';
    }


    /** 
     * Recupera o view atraves do nome
     * Desmembra os dados do array
     * Envia os dados para a view chamada
     * 
     * @param String $viewName
     * @param Array $viewData
     * @return @void
     */
    public function loadView($viewName, $viewData = array())
    {
        extract($viewData); //extract pega os indices do array e transforma em variaveis
        require 'views/' . $viewName . '.php';
    }
}
