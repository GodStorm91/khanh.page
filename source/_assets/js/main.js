window.axios = require('axios');
window.fuse = require('fuse.js');
window.Vue = require('vue');

import Search from './components/Search.vue';
import hljs from 'highlight.js/lib/highlight';

// Syntax highlighting
hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});

(() => {
  const form = document.querySelector('form');
  const formResponse = document.querySelector('js-form-response');

  form.onsubmit = e => {
    e.preventDefault();

    // Prepare data to send
    const data = {};
    const formElements = Array.from(form);
    formElements.map(input => (data[input.name] = input.value));

    axios({
    	method: 'post',
    	url: 'https://b0kr5jos0k.execute-api.ap-northeast-1.amazonaws.com/Production',
    	data: data
    }).then(function(response){
    	alert('Thank you, we have received your questions.')
    }).catch(function(error){
    	alert('Thank you, we have received your questions.');
    })

    // Log what our lambda function will receive
    console.log(JSON.stringify(data));
  };
})();

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },
}).$mount('#vue-search');

