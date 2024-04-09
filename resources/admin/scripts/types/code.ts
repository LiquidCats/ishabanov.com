export enum CodeLanguage {
    JAVASCRIPT = 'javascript',
    BASH = 'bash',
    CSS = 'css',
    DOCKERFILE = 'dockerfile',
    GO = 'go',
    GRAPHQL = 'graphql',
    JSON = 'json',
    MARKDOWN = 'markdown',
    NGINX = 'nginx',
    PHP = 'php',
    PLAINTEXT = 'plaintext',
    SCSS = 'scss',
    SQL = 'sql',
    TYPESCRIPT = 'typescript',
    XML = 'xml',
    YAML = 'yaml',
}

export const codeLanguages: CodeLanguage[] = Object.values(CodeLanguage)
