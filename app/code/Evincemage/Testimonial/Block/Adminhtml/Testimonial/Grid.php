<?php
namespace Evincemage\Testimonial\Block\Adminhtml\Testimonial;


use Evincemage\Testimonial\Model\Status;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Evincemage\Testimonial\Model\TestimonialFactory
     */
    protected $_testimonialFactory;

    /**
     * @var \SR\Weblog\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Evincemage\Testimonial\Model\TestimonialFactory $TestimonialFactory
     * @param \Evincemage\Testimonial\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Evincemage\Testimonial\Model\TestimonialFactory $testimonialFactory,
        \Evincemage\Testimonial\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_testimonialFactory = $testimonialFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
        $this->setFilterVisibility(false);
        //$this->setVarNameFilter('filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_testimonialFactory->create()->getCollection();

        $this->setCollection($collection);


        parent::_prepareCollection();
        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'filter' => false,
                'index' => 'entity_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
                'name'=>'entity_id',
                'sort'=> false
            ]
        );
        $this->addColumn(
            'title',
            [
                'header' => __('Author Name'),
                'index' => 'title',
                'class' => 'xxx',
                'filter' => false,
                'name'=>'title'
            ]
        );

        $this->addColumn(
            'content',
            [
                'header' => __('Content'),
                'index' => 'content',
                'filter' => false,
                'class' => 'xxx',
                'name'=>'content'
            ]
        );

        $this->addColumn(
            'publish_date',
            [
                'header' => __('Publish Date'),
                'index' => 'publish_date',
                'filter' => false,
                'name'=>'publish_date'
            ]
        );


        $this->addColumn(
            'is_active',
            [
                'header' => __('Status'),
                'index' => 'is_active',
                'filter' => false,
                'type' => 'options',
                'name'=>'is_active',
                'options' => $this->_status->getOptionArray()
            ]
        );


        $this->addColumn(
            'edit',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit'
                        ],
                        'field' => 'entity_id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );

      /*  $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }*/

        return parent::_prepareColumns();
    }

    /**
     * @return $this
     */

    
    protected function _prepareMassaction()
    {
        
        $this->setMassactionIdField('entity_id');
    //$this->getMassactionBlock()->setTemplate('Evincemage_Testimonial::testimonial/grid/massaction_extended.phtml');
        //$this->getMassactionBlock()->setFormFieldName('testimonial');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('testimonial/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        array_unshift($statuses, ['label' => '', 'value' => '']);
        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('testimonial/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );


        return $this;
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('testimonial/*/grid', ['_current' => true]);
    }

    /**
     * @param \SR\Weblog\Model\BlogPosts|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl(
            'testimonial/*/edit',
            array('store' => $this->getRequest()->getParam('store'), 'entity_id' => $row->getId())
        );
    }
    
}