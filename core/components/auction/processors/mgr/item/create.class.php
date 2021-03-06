<?php

class AuctionItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'AuctionItem';
    public $classKey = 'AuctionItem';
    public $languageTopics = array('auction');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('auction_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('auction_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'AuctionItemCreateProcessor';