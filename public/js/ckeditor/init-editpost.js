import { initializeCKEditor } from './main.js';

document.addEventListener("DOMContentLoaded", function() {
    let editor;

    initializeCKEditor('#content', newEditor => {
        editor = newEditor;
        if (window.editorInitialData) editor.setData(window.editorInitialData);
    });
});
