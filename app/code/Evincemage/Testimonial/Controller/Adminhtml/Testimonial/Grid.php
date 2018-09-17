<?php
/**
 * @Author: zerokool - Nguyen Huu Tien
 * @Email: tien.uet.qh2011@gmail.com
 * @File Name: Grid.php
 * @File Path: /home/zero/public_html/magento2/074bt16_sample_v3/app/code/Evincemage/Testimonial/Controller/Adminhtml/Faq/Grid.php
 * @Date:   2015-04-08 21:20:58
 * @Last Modified by:   zero
 * @Last Modified time: 2015-07-15 22:52:48
 */


class Grid extends Evincemage\Testimonial\Controller\Adminhtml\Testimonial
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultLayout = $this->resultLayoutFactory->create();
        return $resultLayout;
    }
}
