<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Evincemage\Testimonial\Model\Resource\Testimonial;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Evincemage\Testimonial\Model\Testimonial', 'Evincemage\Testimonial\Model\Resource\Testimonial');
        //$this->_map['fields']['page_id'] = 'main_table.page_id';
    }
 
    
}
