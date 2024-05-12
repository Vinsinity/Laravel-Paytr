<?php

namespace Softliya\Paytr\Exceptions;

class InvalidConfigException extends PaytrException {
    public static function configNotFound() {
        return new static("Credentials not valid!");
    }
}