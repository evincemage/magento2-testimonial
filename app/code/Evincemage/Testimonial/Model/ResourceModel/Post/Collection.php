<?php namespace Evincemage\Testimonial\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Evincemage\Testimonial\Model\Post', 'Evincemage\Testimonial\Model\ResourceModel\Post');
    }

}
