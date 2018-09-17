<?php
namespace Evincemage\Testimonial\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {

          // print_r($this->getRequest()->getParam());
        //exit; 
        $testimonialIds = $this->getRequest()->getParam('massaction');


        if (!is_array($testimonialIds) || empty($testimonialIds)) {
            $this->messageManager->addError(__('Please select testimonial(s).'));
        } else {
            try {
                foreach ($testimonialIds as $postId) {
                    $post = $this->_objectManager->get('Evincemage\Testimonial\Model\Testimonial')->load($postId);
                    $post->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been deleted.', count($testimonialIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('testimonial/*/index');
    }
}
