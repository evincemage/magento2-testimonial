<?php

namespace Evincemage\Testimonial\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface {

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
                        $installer->getTable('testimonial_testimonial')
                )->addColumn(
                        'entity_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, array('identity' => true, 'nullable' => false, 'primary' => true), 'Testimonial ID'
                )->addColumn(
                        'title', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, array('nullable' => false), 'Title'
                )->addColumn(
                        'image', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, array('nullable' => true), 'Image'
                )->addColumn(
                        'content', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '2M', array('nullable' => false), 'Content'
                )->addColumn(
                        'publish_date', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, array(), 'Publish Date'
                )->addColumn(
                        'is_active', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, null, array(), 'Active Status'
                )->addColumn(
                        'created_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT], 'Creation Time'
                )->addColumn(
                        'update_time', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE], 'Modification Time'
                )->setComment(
                'Testimonial Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

}
