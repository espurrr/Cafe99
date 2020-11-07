<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal</title>
    <style>
            /** Common */
            body {
            margin: 0;
            padding: 20px;
            height: 100vh;
            background: #80deea;
            text-align: center;
            }

            /** Button */
            button {
            margin: 0;
            border: none;
            border-radius: 0;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            position: relative;
            }

            .btn {
            font-size: 14px;
            line-height: 1.4;
            padding: 13px 20px;
            border-radius: 4px;
            transition: box-shadow 0.1s, top 0.1s;
            box-shadow: 0 3px 0 rgba(0,0,0,0.3);
            top: 0;
            background: #fff;
            }
            .btn:hover {
            box-shadow: 0 3px 0 transparent;
            top: 3px;
            }
            .btn:active {
            background: #f2f2f2;
            }

            /** Modal */
            .modal {
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            max-width: 300px;
            margin: 0 auto;
            padding: 30px;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.3);
            }
            .modal-close-btn {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 20px;
            }

            /** Overlay */
            .overlay {
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.3);
            }

            /** JS */
            .is-visible {
            opacity: 1;
            pointer-events: auto;
            }

    </style>

</head>
<body>
    <button class="btn" id="btn-modal">開く</button>

    <div class="overlay" id="overlay"></div>
    <div class="modal" id="modal">
    <button class="modal-close-btn" id="close-btn"><i class="fa fa-times" title="閉じる"></i></button>
    モーダル
    </div>


    <script>
        document.getElementById('btn-modal').addEventListener('click', function() {
        document.getElementById('overlay').classList.add('is-visible');
        document.getElementById('modal').classList.add('is-visible');
        });

        document.getElementById('close-btn').addEventListener('click', function() {
        document.getElementById('overlay').classList.remove('is-visible');
        document.getElementById('modal').classList.remove('is-visible');
        });
        document.getElementById('overlay').addEventListener('click', function() {
        document.getElementById('overlay').classList.remove('is-visible');
        document.getElementById('modal').classList.remove('is-visible');
        });




    </script>
    
</body>
</html>