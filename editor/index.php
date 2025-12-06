<?php
// ide.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoForgeIDE</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Monaco Loader -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>

    <style>
        body { overflow: hidden; }
        #editor { height: 100%; width: 100%; }
    </style>
</head>

<body class="bg-gray-900 text-white">

    <!-- TOP BAR -->
    <div class="w-full h-10 bg-gray-800 flex items-center px-4 text-sm border-b border-gray-700">
        <span class="mr-6 font-semibold">RoForgeIDE</span>
        <button id="runBtn" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 rounded text-white text-xs">
            Run Transliterator
        </button>
    </div>

    <div class="flex w-full h-[calc(100vh-40px)]">

        <!-- LEFT SIDEBAR -->
        <div class="w-16 bg-gray-800 flex flex-col items-center py-4 space-y-6 border-r border-gray-700">
            <i class="fas fa-file-code text-2xl text-gray-400 hover:text-white cursor-pointer"></i>
            <i class="fas fa-folder text-2xl text-gray-400 hover:text-white cursor-pointer"></i>
            <i class="fas fa-cog text-2xl text-gray-400 hover:text-white cursor-pointer mt-auto"></i>
        </div>

        <!-- SIDE PANEL -->
        <div class="w-72 bg-gray-850 bg-gray-900 border-r border-gray-700 p-4 overflow-y-auto">
            <h3 class="text-gray-300 text-lg font-semibold mb-4">Explorer</h3>

            <h4 class="text-gray-400 uppercase text-xs font-bold mb-2">Files</h4>
            <ul class="space-y-1 text-gray-300 text-sm" id="fileList">
              <!--  <li class="cursor-pointer hover:text-white" onclick="openFile('main.js')">main.js</li>
                <li class="cursor-pointer hover:text-white" onclick="openFile('test.php')">test.php</li>
-->
                <p>Coming Soon...</p>
            </ul>

            <h4 class="text-gray-400 uppercase text-xs font-bold mt-6 mb-2">Built-in Libraries</h4>
            <ul class="space-y-2 text-gray-300 text-sm">
               <!--<li>JS → Lua Library</li>-->
                <li><a href="https://github.com/RoForgeIDE/Libraries/blob/main/php/">PHP → Lua Library</a></li>
                <!--<li>Roblox API Helpers</li>
                <li>UI Helpers</li>
                <li>DataStore Helpers</li>
-->
            </ul>
        </div>

        <!-- MAIN LAYOUT -->
        <div class="flex flex-col flex-1">

            <!-- TABS -->
            <div class="h-10 bg-gray-800 border-b border-gray-700 flex items-center" id="tabs">
                <div id="main-tab" class="px-4 py-2 h-full flex items-center border-r bg-gray-900 border-gray-700">
                    main
                </div>
            </div>

            <!-- EDITOR + OUTPUT -->
            <div class="flex flex-1">

                <!-- EDITOR -->
                <div id="editor" class="flex-1 bg-gray-900"></div>

                <!-- OUTPUT -->
                <div class="w-1/2 bg-gray-850 border-l border-gray-700 p-4 overflow-auto">
                    <h3 class="text-gray-300 text-lg font-semibold mb-3">Transliterated Lua Output</h3>
                    <pre id="output" class="text-green-300 text-sm">
-- Click "Run Transliterator" to process code.
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <script>

    /* -------------------------------
       Monaco Editor Initialization
    -------------------------------- */
    var editor;

    require.config({
        paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.34.1/min/vs' }
    });

    require(["vs/editor/editor.main"], function () {
        editor = monaco.editor.create(document.getElementById('editor'), {
            value: ``,
            language: "plaintext",   // <-- START AS PLAIN TEXT
            theme: "vs-dark",
            fontSize: 14
        });

        // Listen for typing to detect language
        editor.onDidChangeModelContent(() => detectLanguage());
    });

    /* -------------------------------
       Language Detection Logic
    -------------------------------- */
    function detectLanguage() {
        let code = editor.getValue();

        // PHP Detect
        if (code.match(/<\?php|\$[A-Za-z_]|echo|->/)) {
            monaco.editor.setModelLanguage(editor.getModel(), "php");
            return;
        }

        // JavaScript Detect
        if (code.match(/console\.log|function\s*\(|let\s|const\s|=>|\{\s*\}/)) {
            monaco.editor.setModelLanguage(editor.getModel(), "javascript");
            return;
        }

        // Lua Detect
        if (code.match(/local\s|function\s.*\)|end|:\s*[A-Za-z_]/)) {
            monaco.editor.setModelLanguage(editor.getModel(), "lua");
            return;
        }

        // Default back to plaintext if nothing matches
        monaco.editor.setModelLanguage(editor.getModel(), "plaintext");
    }

    /* -------------------------------
       File Switching Logic
    -------------------------------- */
    const fileContents = {
        "main.js": ``,
        "test.php": ``
    };

    function openFile(name) {
        editor.setValue(fileContents[name] || ``);
        detectLanguage();

        document.getElementById("tabs").innerHTML = `
            <div class="px-4 py-2 h-full flex items-center border-r bg-gray-900 border-gray-700">
                ${name}
            </div>
        `;
    }

    /* -------------------------------
   Transliterator Backend Call
-------------------------------- */
document.getElementById("runBtn").addEventListener("click", () => {
    const code = editor.getValue();

    fetch('./editor/backend/transpile.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ code })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("output").textContent = data.lua;
    })
    .catch(err => {
        document.getElementById("output").textContent = '-- Error connecting to backend';
        console.error(err);
    });
});

</script>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
