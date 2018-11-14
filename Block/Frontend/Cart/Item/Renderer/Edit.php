<?php
/**
 * Copyright Wagento Creative LLC ©, All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Wagento\Subscription\Block\Frontend\Cart\Item\Renderer;

use Magento\Checkout\Block\Cart\Item\Renderer\Actions\Generic;

class Edit extends Generic
{
    /**
     * @var ProductFactory
     */
    public $productFactory;
    /**
     * @var SubscriptionFactory
     */
    public $subscriptionFactory;
    /**
     * @var \Wagento\Subscription\Helper\Subscription
     */
    public $subscription;

    /**
     * @var \Wagento\Subscription\Helper\Data
     */
    public $subscriptionDataHelper;

    /**
     * Edit constructor.
     * @param Template\Context $context
     * @param array $data
     * @param \Wagento\Subscription\Model\ProductFactory $productFactory
     * @param \Wagento\Subscription\Model\SubscriptionFactory $subscriptionFactory
     * @param \Wagento\Subscription\Helper\Subscription $subscription
     * @param \Wagento\Subscription\Helper\Data $subscriptionDataHelper
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Wagento\Subscription\Model\ProductFactory $productFactory,
        \Wagento\Subscription\Model\SubscriptionFactory $subscriptionFactory,
        \Wagento\Subscription\Helper\Subscription $subscription,
        \Wagento\Subscription\Helper\Data $subscriptionDataHelper
    ) {
    
        parent::__construct($context, $data);
        $this->productFactory = $productFactory->create();
        $this->subscriptionFactory = $subscriptionFactory->create();
        $this->subscription = $subscription;
        $this->subHelperData = $subscriptionDataHelper;
    }

    /**
     * @return null|string
     */
    public function getSubscription()
    {
        $data = $this->getSubscriptionData();
        return $data;
    }

    /**
     * @return string
     */
    public function getSubscriptionFrequency()
    {
        $frequency = $this->subscriptionFactory->getFrequency();
        return $this->subHelperData->getSubscriptionFrequency($frequency);
    }

    /**
     * @param string $fileName
     * @return string
     */
    public function fetchView($fileName)
    {
        return parent::fetchView($fileName);
    }

    /**
     * @return mixed
     */
    function getSubscriptionData()
    {
        return $this->subscription->getSubscriptionData($this->getItem()->getProduct()->getId());
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->getItem()->getProduct()->getId();
    }
}