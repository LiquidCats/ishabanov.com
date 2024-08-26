import 'highlight.js/styles/tokyo-night-dark.css'
//
import hljs from 'highlight.js/lib/core'
//
import _bash from 'highlight.js/lib/languages/bash'
import _css from 'highlight.js/lib/languages/css'
import _dockerfile from 'highlight.js/lib/languages/dockerfile'
import _go from 'highlight.js/lib/languages/go'
import _graphql from 'highlight.js/lib/languages/graphql'
import _javascript from 'highlight.js/lib/languages/javascript'
import _json from 'highlight.js/lib/languages/json'
import _markdown from 'highlight.js/lib/languages/markdown'
import _nginx from 'highlight.js/lib/languages/nginx'
import _php from 'highlight.js/lib/languages/php'
import _plaintext from 'highlight.js/lib/languages/plaintext'
import _scss from 'highlight.js/lib/languages/scss'
import _sql from 'highlight.js/lib/languages/sql'
import _typescript from 'highlight.js/lib/languages/typescript'
import _xml from 'highlight.js/lib/languages/xml'
import _yaml from 'highlight.js/lib/languages/yaml'

hljs.registerLanguage('javascript', _javascript)
hljs.registerLanguage('css', _css)
hljs.registerLanguage('dockerfile', _dockerfile)
hljs.registerLanguage('go', _go)
hljs.registerLanguage('graphql', _graphql)
hljs.registerLanguage('javascript', _javascript)
hljs.registerLanguage('json', _json)
hljs.registerLanguage('markdown', _markdown)
hljs.registerLanguage('nginx', _nginx)
hljs.registerLanguage('php', _php)
hljs.registerLanguage('scss', _scss)
hljs.registerLanguage('xml', _xml)
hljs.registerLanguage('yaml', _yaml)
hljs.registerLanguage('typescript', _typescript)
hljs.registerLanguage('sql', _sql as any)
hljs.registerLanguage('bash', _bash as any)
hljs.registerLanguage('plaintext', _plaintext as any)

document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('pre code').forEach((el) => {
    hljs.highlightElement(el as HTMLElement);
  });
});
