<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Evincemage\Testimonial\Controller\Index;

class Post extends \Magento\Framework\App\Action\Action
{
    /**
     * Show Contact Us page
     *
     * @return void
     */
    protected $_objectManager;
    
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\ObjectManagerInterface $objectManager) 
    {
        $this->_objectManager = $objectManager;
        parent::__construct($context);    
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $currenttime = date('Y-m-d H:i:s');
        $model = $this->_objectManager->create('Evincemage\Testimonial\Model\Testimonial');
        $model->setData('title', $post['title']);
        $model->setData('content', $post['content']);
        $model->setData('is_active', 2);
        $model->setData('created_at', $currenttime);
        $model->setData('publish_date', $currenttime);
        $model->save();
        $this->_redirect('*/*/');
        $this->messageManager->addSuccess(__('Your testimonial has beeen submitted successfully.'));    
    }
}
