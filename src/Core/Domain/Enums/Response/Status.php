<?php

namespace ishabanov\Core\Domain\Enums\Response;

enum Status: string
{
    case SUCCESS = 'success';
    case FAIL = 'fail';
    case ERROR = 'error';
}
