<!-- index.php
<!DOCTYPE html>
<html>

<head>
    <title>Execute Flask App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").on("submit", function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "http://localhost/Penelitian_2021/Home/form",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle the response (predictions)
                        var predictions = $(response).filter('script').text();
                        predictions = predictions.replace(');', '').trim();
                        console.log(response);
                        $("#predictions").text(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <h1>Execute Flask App</h1>

    <form>
        <input type="text" name="data" placeholder="Enter data" id="data">
        <input type="submit" name="execute" value="Execute Flask App">
    </form>
    <div id="predictions"></div>

    <?php
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // Get the input data from the form
    //     $data = $_POST["data"];

    //     // Execute the Python script and capture the output
    //     $output = shell_exec("python C:/xampp/htdocs/Penelitian_2021/application/views/home/python_app.py " . escapeshellarg($data) . '2>&1');

    //     // Extract the predictions from the output
    //     preg_match('/\[(.*?)\]/', $output, $matches);
    //     $predictions = $matches[0];

    //     // Display the output (predictions) on the page
    //     echo "<script>$('#predictions').text('$output');</script>";
    // }
    ?>

</body>

</html> -->

<!DOCTYPE html>
<html>

<head>
    <title>Execute Flask App</title>
</head>

<body>
    <h1>Execute Flask App</h1>

    <form action="<?php echo site_url('Home/form'); ?>" method="post">
        <input type="text" name="text" placeholder="Enter data" id="text">
        <input type="submit" name="execute" value="Execute Flask App">
    </form>

    <?php if (!empty($predictions)) {
        // echo $predictions;
        $remove_char = str_replace(array('[', ']', ','), '', $predictions);
        // echo $remove_char;
        $array = explode(" ", $remove_char);
        // echo $array[1];
        // $array = explode(" ", $remove_char);
        // echo $array[4];
    ?>
        <h1>Personality Trait</h1>
        <p>Extraversion: <?= $array[0]; ?> </p>
        <p>Aggreableness: <?= $array[1]; ?></p>
        <p>Openness: <?= $array[2]; ?></p>
        <p>Conscientiousness: <?= $array[3]; ?></p>
        <p>Neuroticisim: <?= $array[4]; ?></p>
    <?php } ?>
</body>

</html>