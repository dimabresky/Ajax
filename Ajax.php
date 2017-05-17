<?php
namespace travelsoft;

/**
 * @author dimabresky
 * 
 * Ajax class of the application
 * 
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
