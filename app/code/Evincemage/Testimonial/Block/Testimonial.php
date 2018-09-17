<?php

/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Evincemage\Testimonial\Block;

use Magento\Framework\View\Element\Template;

/**
 * Main contact form block
 */
class Testimonial extends Template {

    /**
     * @param Template\Context $context
     * @param array $data
     */
    protected $_testimonialFactory;

    public function __construct(Template\Context $context, array $data = [], \Evincemage\Testimonial\Model\TestimonialFactory $testimonialFactory) {
        $this->_testimonialFactory = $testimonialFactory;
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    protected function _prepareCollection() {

        parent::_prepareCollection();
        return $this;
    }

    public function getTestimonial() {
        $collection = $this->_testimonialFactory->create()->getCollection();
        $collection->addFieldToFilter('is_active', 1);

        $collection->getSelect();
        return $collection;
    }

}
