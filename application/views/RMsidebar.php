<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Manager side bar</title>
    <link rel="stylesheet" href="sidebar.css">
</head>
<body>
    
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a class="active" href="#">News Feed</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Orders</a></li>
                <li> <button class="dropdown-btn">Food Menu
                            <i class=" fa fa-caret-down"></i>
                     </button>
                    <div class="dropdown-container">
                    <a href="#">Food item</a>
                    <a href="#">SubCategory</a>
                    <a href="#">Category</a>
                    </div>
                </li>
                <li><a href="#">Analytics</a></li>
            </ul>

        </div>
    </div>
    <script src="./dropdownlist.js"></script>
</body>
</html>