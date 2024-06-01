<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bKash Error</title>
</head>
<body>
    <h1>bKash Error</h1>
    <p><?php echo $message; ?></p>
    <!-- You can style this as needed with CSS -->

    <script>
        setTimeout(() => {
            location.replace("<?= base_url() . "uBill" ?>")
        }, 3000);
    </script>
</body>
</html>