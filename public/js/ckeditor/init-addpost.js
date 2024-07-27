import { initializeCKEditor } from './main.js';

document.addEventListener("DOMContentLoaded", function() {
    let editor;

    initializeCKEditor('#content', newEditor => {
        editor = newEditor;
    });
});
