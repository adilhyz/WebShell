<?php
$statusMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $from = $_POST["from"];
    $sendCount = isset($_POST["send_count"]) ? intval($_POST["send_count"]) : 1; // Get the number of times to send the message (default is 1)

    // Set the email headers
    $boundary = md5(uniqid());
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";

    for ($count = 0; $count < $sendCount; $count++) {
        // Create the message body
        $body = "--$boundary\r\n";
        $body .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $message . "\r\n";

        // Attach the files
        if (isset($_FILES['attachment'])) {
            $fileCount = count($_FILES['attachment']['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                if ($_FILES['attachment']['error'][$i] == UPLOAD_ERR_OK) {
                    $attachment = chunk_split(base64_encode(file_get_contents($_FILES['attachment']['tmp_name'][$i])));
                    $body .= "--$boundary\r\n";
                    $body .= "Content-Type: {$_FILES['attachment']['type'][$i]}; name=\"{$_FILES['attachment']['name'][$i]}\"\r\n";
                    $body .= "Content-Disposition: attachment; filename=\"{$_FILES['attachment']['name'][$i]}\"\r\n";
                    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
                    $body .= $attachment . "\r\n";
                }
            }
        }

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            $statusMessage = "Email sent successfully.";
        } else {
            $statusMessage = "Email sending failed.";
            break; // Stop sending emails if an error occurs
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MysteryBoyMailer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #111;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
color: #fff;
}
    form {
        width: 100%;
        max-width: 500px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #222;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 20px 40px rgba(0, 0, 0.1);
    }

    label {
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 10px;
        color: #fff;
    }

    input[type="email"],
    input[type="text"],
    textarea,
    input[type="number"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
        background-color: #333;
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        outline: none;
    }

    input[type="email"]:focus,
    input[type="text"]:focus,
    textarea:focus,
    input[type="number"]:focus {
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    textarea {
        height: 150px;
        resize: none;
    }

    .file-input {
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .file-input input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-input label {
        background-color: #ff4444;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
        display: inline-block;
    }

    .file-input label:hover {
        background-color: #ff3333;
    }

    .file-input-file-names {
        font-size: 16px;
        font-weight: 400;
        color: #fff;
        background-color: #333;
        border: none;
        border-radius: 5px;
        padding: 10px;
        margin-top: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-style: italic;
    }

    input[type="submit"] {
        background-color: #ff4444;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
        margin-bottom: 20px;
        margin-top: 30px;
    }

    input[type="submit"]:hover {
        background-color: #ff3333;
    }

    @media screen and (max-width: 768px) {
        form {
            padding: 20px;
        }
    }

    @media screen and (max-width: 480px) {
        h1 {
            font-size: 28px;
        }

        form
{
max-width: 350px;
}
        input[type="submit"] {
            font-size: 16px;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>MysteryBoyMailer</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="from">From</label>
            <input type="email" id="from" name="from" required>
            <label for="to">To</label>
            <input type="email" id="to" name="to" required>
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="10" required></textarea>
            <label for="send_count">Send Count</label>
            <input type="number" id="send_count" name="send_count" value="1" min="1" class="form-input">
            <div class="file-input">
                <input type="file" id="attachment" name="attachment[]" multiple onchange="updateFileNames()">
<label for="attachment">Choose Files</label>
            </div>
            <div id="file-names"></div>
            <input type="submit" value="Send">
            <p style="color: #fff;"><?php echo $statusMessage; ?></p>
        </form>
    </div>
    <script>
        function updateFileNames() {
            const files = document.getElementById("attachment").files;
            let fileNames = "";
            for (let i = 0; i < files.length; i++) {
                fileNames += '<span class="file-input-file-names">' + files[i].name + "</span>";
            }
            document.getElementById("file-names").innerHTML = fileNames;
        }
    </script>
</body>
</html>