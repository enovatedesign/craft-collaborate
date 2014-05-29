<?php
namespace Craft;

class Collaborate_TemplatesService extends BaseApplicationComponent
{

    public function render($name, $variables=array())
    {
        $originalTemplatesPath = craft()->path->getTemplatesPath();
        craft()->path->setTemplatesPath( craft()->path->getPluginsPath() . '/collaborate/templates/' );
        $template = craft()->templates->render( $name, $variables );
        craft()->path->setTemplatesPath( $originalTemplatesPath );
        return $template;
    }

}