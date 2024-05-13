<?php

namespace Softliya\Paytr\DirectPayment;

use Softliya\Paytr\Enums\Currency;
use Softliya\Paytr\PayTRClient;
use Softliya\Paytr\Utils\Basket;
use Softliya\Paytr\PayTRResponse;

class DirectPayment extends PayTRClient {
    private ?string $userIp;

    private ?string $merchantOid;

    private ?string $email;

    private null|float|string $paymentAmount;

    private ?string $paymentType = 'card';

    private ?string $cardType;

    private ?int $installmentCount = 0;

    private ?int $installmentStatus = 0;

    private ?string $currency = Currency::TL;

    private ?int $non3d = 0;

    private ?int $non3dTestFailed = 0;

    private ?string $clientLang = 'tr';

    private ?string $ccOwner;

    private ?string $cardNumber;

    /**
     * @var string|null $expiryMonth
     * @example 1, 2, 3, .. , 11, 12
     */
    private ?string $expiryMonth;

    /**
     * @var string|null $expiryYear
     * @example 20, 21, 22,…
     */
    private ?string $expiryYear;

    private ?string $cvv;

    private ?string $successUrl;

    private ?string $failUrl;

    private ?string $userName;

    private ?string $userAddress;

    private ?string $userPhone;

    private ?Basket $basket;

    private ?int $debugOn = 1;

    private ?int $syncMode = 0;

    private ?string $uToken;

    private ?int $storeCard = 0;

    private ?string $cToken;

    private ?int $recurringPayment;

    /**
     * @return string|null
     */
    public function getUserIp(): ?string
    {
        return $this->userIp;
    }

    /**
     * @param string|null $userIp
     * @return DirectPayment
     */
    public function setUserIp(?string $userIp): static
    {
        $this->userIp = $userIp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMerchantOid(): ?string
    {
        return $this->merchantOid;
    }

    /**
     * @param string|null $merchantOid
     * @return DirectPayment
     */
    public function setMerchantOid(?string $merchantOid): static
    {
        $this->merchantOid = $merchantOid;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return DirectPayment
     */
    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPaymentAmount(): ?float
    {
        return $this->paymentAmount;
    }

    /**
     * @param string|float|null $paymentAmount
     * @return DirectPayment
     */
    public function setPaymentAmount($paymentAmount): static
    {
        $this->paymentAmount = $paymentAmount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @param string|null $paymentType
     * @return DirectPayment
     */
    public function setPaymentType(?string $paymentType): static
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    /**
     * @param string|null $cardType
     * @return DirectPayment
     */
    public function setCardType(?string $cardType): static
    {
        $this->cardType = $cardType;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInstallmentStatus(): ?int
    {
        return $this->installmentStatus;
    }

    /**
     * @param int|null $installmentStatus
     * @return DirectPayment
     */
    public function setInstallmentStatus(?int $installmentStatus): static
    {
        $this->installmentStatus = $installmentStatus;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInstallmentCount(): ?int
    {
        return $this->installmentCount;
    }

    /**
     * @param int|null $installmentCount
     * @return DirectPayment
     */
    public function setInstallmentCount(?int $installmentCount): static
    {
        $this->installmentCount = $installmentCount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     * @return DirectPayment
     */
    public function setCurrency(?string $currency): static
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNon3d(): ?int
    {
        return $this->non3d;
    }

    /**
     * @param int|null $non3d
     * @return DirectPayment
     */
    public function setNon3d(?int $non3d): static
    {
        $this->non3d = $non3d;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNon3dTestFailed(): ?int
    {
        return $this->non3dTestFailed;
    }

    /**
     * @param int|null $non3dTestFailed
     * @return DirectPayment
     */
    public function setNon3dTestFailed(?int $non3dTestFailed): static
    {
        $this->non3dTestFailed = $non3dTestFailed;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientLang(): ?string
    {
        return $this->clientLang;
    }

    /**
     * @param string|null $clientLang
     * @return DirectPayment
     */
    public function setClientLang(?string $clientLang): static
    {
        $this->clientLang = $clientLang;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCcOwner(): ?string
    {
        return $this->ccOwner;
    }

    /**
     * @param string|null $ccOwner
     * @return DirectPayment
     */
    public function setCcOwner(?string $ccOwner): static
    {
        $this->ccOwner = $ccOwner;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    /**
     * @param string|null $cardNumber
     * @return DirectPayment
     */
    public function setCardNumber(?string $cardNumber): static
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiryMonth(): ?string
    {
        return $this->expiryMonth;
    }

    /**
     * @param string|null $expiryMonth
     * @return DirectPayment
     */
    public function setExpiryMonth(?string $expiryMonth): static
    {
        $this->expiryMonth = $expiryMonth;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiryYear(): ?string
    {
        return $this->expiryYear;
    }

    /**
     * @param string|null $expiryYear
     * @return DirectPayment
     */
    public function setExpiryYear(?string $expiryYear): static
    {
        $this->expiryYear = $expiryYear;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    /**
     * @param string|null $cvv
     * @return DirectPayment
     */
    public function setCvv(?string $cvv): static
    {
        $this->cvv = $cvv;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuccessUrl(): ?string
    {
        return $this->successUrl;
    }

    /**
     * @return string|null
     */
    public function getFailUrl(): ?string
    {
        return $this->failUrl;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     * @return DirectPayment
     */
    public function setUserName(?string $userName): static
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserAddress(): ?string
    {
        return $this->userAddress;
    }

    /**
     * @param string|null $userAddress
     * @return DirectPayment
     */
    public function setUserAddress(?string $userAddress): static
    {
        $this->userAddress = $userAddress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    /**
     * @param string|null $userPhone
     * @return DirectPayment
     */
    public function setUserPhone(?string $userPhone): static
    {
        $this->userPhone = $userPhone;
        return $this;
    }

    /**
     * @return Basket|null
     */
    public function getBasket(): ?Basket
    {
        return $this->basket;
    }

    /**
     * @param Basket|null $basket
     * @return DirectPayment
     */
    public function setBasket(?Basket $basket): static
    {
        $this->basket = $basket;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDebugOn(): ?int
    {
        return $this->debugOn;
    }

    /**
     * @param int|null $debugOn
     * @return DirectPayment
     */
    public function setDebugOn(?int $debugOn): static
    {
        $this->debugOn = $debugOn;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSyncMode(): ?int
    {
        return $this->syncMode;
    }

    /**
     * @param int|null $syncMode
     * @return DirectPayment
     */
    public function setSyncMode(?int $syncMode): static
    {
        $this->syncMode = $syncMode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUToken(): ?string
    {
        return $this->uToken;
    }

    /**
     * @param string|null $uToken
     * @return DirectPayment
     */
    public function setUToken(?string $uToken): static
    {
        $this->uToken = $uToken;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStoreCard(): ?int
    {
        return $this->storeCard;
    }

    /**
     * @param int|null $storeCard
     * @return DirectPayment
     */
    public function setStoreCard(?int $storeCard): static
    {
        $this->storeCard = $storeCard;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCToken(): ?string
    {
        return $this->cToken;
    }

    /**
     * @param string|null $cToken
     * @return DirectPayment
     */
    public function setCToken(?string $cToken): static
    {
        $this->cToken = $cToken;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRecurringPayment(): ?int
    {
        return $this->recurringPayment;
    }

    /**
     * @param int|null $recurringPayment
     * @return DirectPayment
     */
    public function setRecurringPayment(?int $recurringPayment): static
    {
        $this->recurringPayment = $recurringPayment;
        return $this;
    }


    private function getHash(): string
    {
        return $this->credentials['merchant_id'] .
            $this->getUserIp() .
            $this->getMerchantOid() .
            $this->getEmail() .
            $this->getPaymentAmount() .
            $this->getPaymentType() .
            $this->getInstallmentCount() .
            $this->getCurrency() .
            (int)$this->options['test_mode'] .
            $this->getNon3d() .
            $this->credentials['merchant_salt'];
    }

    public function setSuccessUrl(string $url): static
    {
        $this->options['success_url'] = $url;
        return $this;
    }

    public function setFailUrl(string $url): static
    {
        $this->options['fail_url'] = $url;
        return $this;
    }

    public function createRecurringPayment(): PayTRResponse
    {
        $hash = $this->getHash();
        $token = $this->generateToken($hash);

        $body = [
            'merchant_id' => $this->credentials['merchant_id'],
            'paytr_token' => $token,
            'user_ip' => $this->getUserIp(),
            'merchant_oid' => $this->getMerchantOid(),
            'email' => $this->getEmail(),
            'payment_type' => $this->getPaymentType(),
            'payment_amount' => $this->getPaymentAmount(),
            'installment_count' => $this->getInstallmentCount(),
            'currency' => $this->getCurrency(),
            'test_mode' => (int)$this->options['test_mode'],
            'non_3d' => $this->getNon3d(),
            'non3d_test_failed' => $this->getNon3dTestFailed(),
            'merchant_ok_url' => $this->options['success_url'],
            'merchant_fail_url' => $this->options['fail_url'],
            'user_name' => $this->getUserName(),
            'user_address' => $this->getUserAddress(),
            'user_phone' => $this->getUserPhone(),
            'user_basket' => $this->getBasket()->formatted(),
            'debug_on' => $this->getDebugOn(),
            'utoken' => $this->getUToken(),
            'ctoken' => $this->getCToken(),
            'recurring_payment' => $this->getRecurringPayment(),
        ];

        $response = $this->callApi('POST', 'odeme', $body);
        return new PayTRResponse(json_decode((string)$response->getBody(), true));
    }

    public function getBody()
    {
        $hash = $this->getHash();
        $token = $this->generateToken($hash);
        return [
            'merchant_id' => $this->credentials['merchant_id'],
            'paytr_token' => $token,
            'user_ip' => $this->getUserIp(),
            'merchant_oid' => $this->getMerchantOid(),
            'email' => $this->getEmail(),
            'payment_type' => $this->getPaymentType(),
            'payment_amount' => $this->getPaymentAmount(),
            'installment_count' => $this->getInstallmentCount(),
            // 'no_installment' => $this->getInstallmentStatus(),
            'max_installment' => 0,
            // 'card_type' => $this->getCardType(),
            'currency' => $this->getCurrency(),
            'lang' => $this->getClientLang(),
            'test_mode' => (int)$this->options['test_mode'],
            'non_3d' => $this->getNon3d(),
            'non3d_test_failed' => $this->getNon3dTestFailed(),
            'merchant_ok_url' => $this->options['success_url'],
            'merchant_fail_url' => $this->options['fail_url'],
            'user_name' => $this->getUserName(),
            'user_address' => $this->getUserAddress(),
            'user_phone' => $this->getUserPhone(),
            'user_basket' => $this->getBasket()->entity(),
            'debug_on' => $this->getDebugOn(),
            'sync_mode' => $this->getSyncMode(),
            'store_card' => $this->getStoreCard(),
        ];
    }

    public function create()
    {
        $body = $this->getBody();

        $body['cc_owner'] = $this->getCcOwner();
        $body['card_number'] = $this->getCardNumber();
        $body['expiry_month'] = $this->getExpiryMonth();
        $body['expiry_year'] = $this->getExpiryYear();
        $body['cvv'] = $this->getCvv();
        // return $body;
        // return $this->generateToken($this->getHash());
        $response = $this->callApi('POST', 'odeme', $body);
        return $response->getBody();
    }
}