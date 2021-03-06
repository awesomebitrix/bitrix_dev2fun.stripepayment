<?php
/**
 *
 * @author darkfriend <hi@darkfriend.ru>
 * @copyright (c) 2017, darkfriend
 * @version 1.0.0
 *
 */
if(class_exists('Dev2funModuleStripeClass')) return;

class Dev2funModuleStripeClass extends CModule {
    public static $module_id = 'dev2fun.stripepayment';
    public static $arScanDir = array(
        '/bitrix/modules/dev2fun.stripepayment/sale_payment/stripe/templates',
        '/local/php_interface/sale_payment/stripe/templates',
        '/bitrix/php_interface/sale_payment/stripe/templates',
    );

    /**
     * Get all templates
     * @return array
     */
    public static function GetSupportTemplates() {
        $arScanDir = self::$arScanDir;
        $arTemplates = array();
        if($arScanDir) {
            foreach ($arScanDir as $sdir) {
                $dirPath = $_SERVER['DOCUMENT_ROOT'].$sdir;
                $d = dir($dirPath);
                if(!$d) continue;
                while ($dir=$d->read()) {
                    $dir = mb_strtoupper($dir);
                    if(!in_array($dir,array('.','..')) && !in_array($dir,$arTemplates)){
                        $arTemplates[$dir] = $dir;
                    }
                }
            }
        }
        return $arTemplates;
    }

    /**
     * Get path to template
     * @param $template - template name
     * @return bool|string
     */
    public static function GetPathTemplate($template){
        if(!$template) return false;
        $template = mb_strtolower($template);
        $arScanDir = self::$arScanDir;
        if(!$arScanDir) return false;
        foreach ($arScanDir as $sdir) {
            $dirPath = $_SERVER['DOCUMENT_ROOT'].$sdir;
            $d = dir($dirPath);
            if(!$d) continue;
            while ($dir=$d->read()) {
                $dir = mb_strtolower($dir);
                if(!in_array($dir,array('.','..')) && $dir==$template){
                    return $dirPath.'/'.$dir.'/templates.php';
                }
            }
        }
        return false;
    }
}