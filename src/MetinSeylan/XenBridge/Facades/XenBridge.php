<?php namespace MetinSeylan\XenBridge\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class XenBridge extends Facade {
     
    
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'XenBridge'; }
 
}