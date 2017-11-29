<?php
namespace travelsoft;

/**
 * Класс для подгрузки динамических областей
 * @author dimabresky
 * @copyright (c) 2017, travelsoft
 */
class Ajax {
    
    public static function start ($label, $arrAttributes) {
        
        self::checkException($label, "Start");
        
        global $APPLICATION;
        
        $request = self::getRequest();
       
        foreach ($arrAttributes as $attr => $value) {
            $arr[] = $attr . "=\"" . $value . "\"";
        }
        
        echo "<div id='" . $label . "' ".implode(" ", $arr).">";
        
        if($request->get('ajax') == $label)
            $APPLICATION->RestartBuffer();
        
    }
    
    public static function end ($label) {
        
        self::checkException($label, "End");
        $request = self::getRequest();
        
        if($request->get('ajax') == $label) {
            die();
        }
       
        echo "</div>";  
    }
    
    protected static function getRequest () {
        return \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    }
    
    protected static function checkException ($label, $mn) {
        if ($label == "") {
            throw new \Exception($mn . ": label of ajax area not setted");
        }
    }
    
}
