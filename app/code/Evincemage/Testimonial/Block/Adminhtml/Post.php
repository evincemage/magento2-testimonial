<?php
namespace Evincemage\Testimonial\Block\Adminhtml;

class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'Evincemage_Testimonial';
        $this->_headerText = __('Manage Testimonial');

        parent::_construct();

        if ($this->_isAllowedAction('Evincemage_Testimonial::save')) {
            $this->buttonList->update('add', 'label', __('Add New Testimonial'));
        } else {
            $this->buttonList->remove('add');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
