<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Enums;

use App\Domains\Blocks\Contracts\Enums\StyleEnum;

enum CodeLanguage: string implements StyleEnum
{
    case JAVASCRIPT = 'javascript';
    case BASH = 'bash';
    case CSS = 'css';
    case DOCKERFILE = 'dockerfile';
    case GO = 'go';
    case GRAPHQL = 'graphql';
    case JSON = 'json';
    case MARKDOWN = 'markdown';
    case NGINX = 'nginx';
    case PHP = 'php';
    case PLAINTEXT = 'plaintext';
    case SCSS = 'scss';
    case SQL = 'sql';
    case TYPESCRIPT = 'typescript';
    case XML = 'xml';
    case YAML = 'yaml';

    public function toStyle(): string
    {
        return "language-{$this->value}";
    }
}
