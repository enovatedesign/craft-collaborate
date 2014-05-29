<?php
namespace Craft;

class CollaborateService extends BaseApplicationComponent {

    protected $settings = null;

    public function inject()
    {
        if ( ! craft()->request->isAjaxRequest() )
        {
            $settings = $this->getSettings();

            if ( ($settings->enableSite && craft()->request->isSiteRequest()) || ($settings->enableCp && craft()->request->isCpRequest()) )
            {
                // add the TogetherJS config needs to be injected by includeFootHtml so it's output before TogetherJS is loaded
                $togetherJsConfig = craft()->collaborate_templates->render('_togetherjs', array('settings' => $settings));
                craft()->templates->includeFootHtml($togetherJsConfig);

                // load TogetherJS itself
                craft()->templates->includeFootHtml('<script src="https://togetherjs.com/togetherjs-min.js"></script>');

                // override some styles to fit Craft better
                // craft()->templates->includeCssResource('collaborate/collaborate.css');

                // hook up the 'Collaborate' button
                if ( craft()->request->isCpRequest() && $settings->enableCp )
                {
                    $javascript = craft()->collaborate_templates->render('_javascript', array('settings' => $settings));
                    craft()->templates->includeJs($javascript);
                }
            }
        }
    }

    private function getSettings()
    {
        if (!$this->settings)
        {
            $this->settings = craft()->plugins->getPlugin('collaborate')->getSettings();
        }

        return $this->settings;
    }

}