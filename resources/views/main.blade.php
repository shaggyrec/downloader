<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Downloader</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <style>
            * {
                box-sizing: border-box;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
                font-size: 18px;
            }
            .content {
                margin: 0 auto;
                max-width: 1000px;
                padding: 20px 15px;
            }
            .input {
                outline: none!important;
                width: 100%;
                padding: 10px;
                border-radius: 4px;
                font-size: 1rem;
            }
            .form {
                display: flex;
                margin-bottom: 3rem;
            }
            .button {
                padding: 0 20px 0 10px;
                font-size: 1rem;
                background: #0000ee;
                color: #fff;
                border-radius: 0 30px 30px 0;
            }
            table {
                width: 100%;
            }
            td, th {
                border-bottom: 2px solid #ccc;
            }
            th {
                border-width: 4px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1>Downloader</h1>
            <form id="downloadForm" class="form">
                <input id="srcForDownload" class="input" type="text" placeholder="Input resource url"/>
                <button class="button">download</button>
            </form>
            <div id="filesListContainer" style="display: none;">
                <h2>Files</h2>
                <table>
                    <thead>
                        <tr>
                            <th>source</th>
                            <th>status</th>
                            <th>download</th>
                        </tr>
                    </thead>
                    <tbody id="filesList"></tbody>
                </table>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
