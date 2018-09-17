<?php
namespace Evincemage\Testimonial\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;

class MassStatus extends \Magento\Backend\App\Action
{
    /**
     * Update blog post(s) status action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $testimonialIds = $this->getRequest()->getParam('massaction');
        if (!is_array($testimonialIds) || empty($testimonialIds)) {
            $this->messageManager->addError(__('Please select testimonial(s).'));
        } else {
            try {
                $status = (int) $this->getRequest()->getParam('status');
                foreach ($testimonialIds as $postId) {
                    $post = $this->_objectManager->get('Evincemage\Testimonial\Model\Testimonial')->load($postId);
                    $post->setIsActive($status)->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been updated.', count($testimonialIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('testimonial/*/index');
    }

}
