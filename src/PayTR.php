<?php

namespace Softliya\Paytr;

use Softliya\Paytr\Utils\Basket;
use Softliya\Paytr\Payment\Payment;
use Illuminate\Support\Facades\Request;
use Softliya\Paytr\DirectPayment\CardStorage;
use Softliya\Paytr\DirectPayment\Installment;
use Softliya\Paytr\DirectPayment\DirectPayment;
use Softliya\Paytr\Payment\PaymentVerification;
use Softliya\Paytr\DirectPayment\BankIdentification;
use Softliya\Paytr\DirectPayment\DirectPaymentVerification;

class PayTR {

    private $client;
    private $credentials;
    private $options;

    // public function __construct($client, $credentials, $options = []) {
    //     $this->client = $client;
    //     $this->credentials = $credentials;
    //     $this->options = $options;
    // }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
    }
    
    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function createPayment(Payment $payment)
    {
        return $payment->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options)
            ->create();
    }


    public function payment()
    {
        return new Payment();
    }

    public function directPayment(): DirectPayment
    {
        $payment = new DirectPayment();
        $payment->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $payment;
    }

    public function bin()
    {
        $bin = new BankIdentification();
        $bin->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $bin;
    }

    public function installments()
    {
        $installment = new Installment();
        $installment->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $installment;
    }

    public function basket()
    {
        return new Basket();
    }

    public function directPaymentVerification(Request $request)
    {
        $verification = new DirectPaymentVerification($request);
        $verification->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $verification;
    }

    public function cardStorage()
    {
        $capi = new CardStorage();
        $capi->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $capi;
    }

    public function paymentVerification(Request $request)
    {
        $verification = new PaymentVerification($request);
        $verification->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $verification;
    }
}