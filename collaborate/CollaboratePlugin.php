<?php
namespace Craft;

class CollaboratePlugin extends BasePlugin {

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
            'hasCpSection'              => array(AttributeType::Bool,   'default' => true),
            'pluginName'                => array(AttributeType::String, 'default' => 'Collaborate'),
            'enableSite'                => array(AttributeType::Bool,   'default' => true),
            'enableCp'                  => array(AttributeType::Bool,   'default' => true),
            'siteName'                  => array(AttributeType::String),
            'hubBase'                   => array(AttributeType::String),
            'dontShowAllClicks'         => array(AttributeType::Bool,   'default' => false),
            'dontShowClicks'            => array(AttributeType::String),
            'cloneAllClicks'            => array(AttributeType::Bool,   'default' => false),
            'cloneClicks'               => array(AttributeType::String),
            'enableShortcut'            => array(AttributeType::Bool,   'default' => true),
            'suppressJoinConfirmation'  => array(AttributeType::Bool,   'default' => false),
            'suppressInvite'            => array(AttributeType::Bool,   'default' => false),
            'includeHashInUrl'          => array(AttributeType::Bool,   'default' => true),
            'ignoreAllForms'            => array(AttributeType::Bool,   'default' => false),
            'ignoreForms'               => array(AttributeType::String, 'default' => ':password'),
            'disableWebRTC'             => array(AttributeType::Bool,   'default' => true),
            'youtube'                   => array(AttributeType::Bool,   'default' => false),
            'ignoreAllMessages'         => array(AttributeType::Bool,   'default' => false)
        );
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('collaborate/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

    public function init()
    {
        parent::init();

        craft()->collaborate->inject();
    }
}