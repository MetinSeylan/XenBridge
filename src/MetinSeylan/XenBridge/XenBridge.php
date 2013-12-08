<?php

namespace MetinSeylan\XenBridge;

use Illuminate\Support\Facades\Config;
use XenForo_Autoloader;
use XenForo_Application;
use XenForo_Session;
use XenForo_Visitor;
use XenForo_Model;

class XenBridge {

    static function boot() {

        $lib = $_SERVER['DOCUMENT_ROOT'] . '/' . Config::get('XenBridge::config.xenforoFolder') . '/library';
    
        require($lib . '/XenForo/Autoloader.php');
        
        XenForo_Autoloader::getInstance()->setupAutoloader($lib);
        
        /* Xenforo Application'a statik değişken atandı ve exception atamasına kontrol kondu */
        XenForo_Application::$disableHandleException = true;
        
        XenForo_Application::initialize($lib, $_SERVER['DOCUMENT_ROOT']);
        XenForo_Application::disablePhpErrorHandler();
        
       
        
        if (Config::get('XenBridge::config.autoLogin'))
            XenForo_Session::startPublicSession();
        

    }


    public function getDb() {
        return XenForo_Application::getDb();
    }

    public function getModel($model) {
        return XenForo_Model::create($model);
    }

    public function getHelper($class) {
        if (strpos($class, '_') === false) {
            $class = 'XenForo_ControllerHelper_' . $class;
        }

        $class = XenForo_Application::resolveDynamicClass($class);

        return new $class('XF');
    }

    public function getOption($option) {
        return XenForo_Application::get('options')->$option;
    }

}