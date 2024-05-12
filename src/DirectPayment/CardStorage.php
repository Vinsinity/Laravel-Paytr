<?php

namespace Softliya\Paytr\DirectPayment;

use Softliya\Paytr\PayTRClient;
use Softliya\Paytr\PayTRResponse;

class CardStorage extends PayTRClient {
    private ?string $uToken;

    /**
     * @return string|null
     */
    public function getUToken(): ?string
    {
        return $this->uToken;
    }

    /**
     * @param string|null $uToken
     * @return CardStorage
     */
    public function setUToken(?string $uToken): static
    {
        $this->uToken = $uToken;
        return $this;
    }

    public function getList()
    {
        $hash = $this->getUToken() . $this->credentials['merchant_salt'];
        $token = $this->generateToken($hash);

        $body = [
            'merchant_id' => $this->credentials['merchant_id'],
            'utoken' => $this->getUToken(),
            'paytr_token' => $token,
        ];
        $response = $this->callApi('POST', 'odeme/capi/list', $body);

        return new PayTRResponse(json_decode((string)$response->getBody(), true));
    }

}