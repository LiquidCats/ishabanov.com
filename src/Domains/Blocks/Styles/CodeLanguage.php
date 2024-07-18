<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Styles;

use App\Domains\Blocks\Contracts\StyleValueContainer;

enum CodeLanguage: string implements StyleValueContainer
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
}
