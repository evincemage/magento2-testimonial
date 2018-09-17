<?php
namespace Evincemage\Testimonial\Controller\Adminhtml\Post;

use Evincemage\Testimonial\Controller\Adminhtml\AbstractMassStatus;

/**
 * Class MassEnable
 */
class MassEnable extends AbstractMassStatus
{
    /**
     * Field id
     */
    const ID_FIELD = 'entity_id';

    /**
     * Resource collection
     *
     * @var string
     */
    protected $collection = 'Evincemage\Testimonial\Model\ResourceModel\Post\Collection';

    /**
     * Post model
     *
     * @var string
     */
    protected $model = 'Evincemage\Testimonial\Model\Post';

    /**
     * Post enable status
     *
     * @var boolean
     */
    protected $status = true;
}
