<?php
namespace Evincemage\Testimonial\Model\Post\Source;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Evincemage\Testimonial\Model\Post
     */
    protected $post;

    /**
     * Constructor
     *
     * @param \Evincemage\Testimonial\Model\Post $post
     */
    public function __construct(\Evincemage\Testimonial\Model\Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->post->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
