<?php
namespace Evincemage\Testimonial\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Evincemage_Testimonial::post';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Evincemage_Testimonial::post');
        $resultPage->addBreadcrumb(__('Testimonial Posts'), __('Testimonial Posts'));
        $resultPage->addBreadcrumb(__('Manage Testimonial Posts'), __('Manage Testimonial'));
        $resultPage->getConfig()->getTitle()->prepend(__('Testimonial Posts'));

        return $resultPage;
    }
}
