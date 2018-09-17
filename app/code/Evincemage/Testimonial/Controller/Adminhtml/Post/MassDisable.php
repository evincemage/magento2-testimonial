<?php
namespace Evincemage\Testimonial\Controller\Adminhtml\Post;

use Evincemage\Testimonial\Controller\Adminhtml\AbstractMassStatus;

/**
 * Class MassDisable
 */
class MassDisable extends AbstractMassStatus
{
    /**
     * Field id
     */
    const ID_FIELD = 'post_id';

    /**
     * Resource collection
     *
     * @var string
     */
    protected $collection = 'Evincemage\Testimonial\Model\ResourceModel\Post\Collection';

    /**
     * Page model
     *
     * @var string
     */
    protected $model = 'Evincemage\Testimonial\Model\Post';

    /**
     * Page disable status
     *
     * @var boolean
     */
    protected $status = false;
}
