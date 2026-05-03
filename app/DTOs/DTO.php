<?php

namespace App\DTOs;

abstract class DTO {

    abstract static function fromRequest(array $request): self;

    function toArray(): array
    {
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
    }

}