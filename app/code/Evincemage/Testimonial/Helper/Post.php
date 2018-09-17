<?php namespace Evincemage\Testimonial\Helper;

use Magento\Framework\App\Action\Action;

class Post extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var \Evincemage\Testimonial\Model\Post
     */
    protected $_post;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Evincemage\Testimonial\Model\Post $post
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Evincemage\Testimonial\Model\Post $post,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->_post = $post;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Return a Testimonial post from given post id.
     *
     * @param Action $action
     * @param null $postId
     * @return \Magento\Framework\View\Result\Page|bool
     */
    public function prepareResultPost(Action $action, $postId = null)
    {
        if ($postId !== null && $postId !== $this->_post->getId()) {
            $delimiterPosition = strrpos($postId, '|');
            if ($delimiterPosition) {
                $postId = substr($postId, 0, $delimiterPosition);
            }

            if (!$this->_post->load($postId)) {
                return false;
            }
        }

        if (!$this->_post->getId()) {
            return false;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        // We can add our own custom page handles for layout easily.
        $resultPage->addHandle('testimonial_post_view');

        // This will generate a layout handle like: Testimonial_post_view_id_1
        // giving us a unique handle to target specific Testimonial posts if we wish to.
        $resultPage->addPageLayoutHandles(['id' => $this->_post->getId()]);

        // Magento is event driven after all, lets remember to dispatch our own, to help people
        // who might want to add additional functionality, or filter the posts somehow!
        $this->_eventManager->dispatch(
            'evince_testimonial_post_render',
            ['post' => $this->_post, 'controller_action' => $action]
        );

        return $resultPage;
    }
}
