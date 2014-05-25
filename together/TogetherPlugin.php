<?php
namespace Craft;

class TogetherPlugin extends BasePlugin {

    public function getName()
    {
        return Craft::t( $this->getSettings()->pluginName );
    }

    public function getVersion()
    {
        return '0.1.0';
    }

    public function getDeveloper()
    {
        return 'Enovate Design';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.enov8.co.uk';
    }

    public function hasCpSection()
    {
        return $this->getSettings()->hasCpSection;
    }

    protected function defineSettings()
    {
        return array(
            'hasCpSection' => array(AttributeType::Email, 'default' => true),
            'pluginName'   => array(AttributeType::String, 'default' => 'Craft Together'),
        );
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('together/_settings', array(
            'settings' => $this->getSettings()
        ));
    }
}