<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body oncontextmenu="return false;">
    <div>
        <h1>Welcome to Our Website</h1>
        <p>This is some valuable content that you don't want users to copy.</p>
    </div>
    <script>
        document.addEventListener('keydown', function(event) {
            if ((event.ctrlKey || event.metaKey) && event.key === 'c') {
                event.preventDefault();
                alert('Copying is disabled on this website.');
            }
        });
    </script>
</body>
</html>