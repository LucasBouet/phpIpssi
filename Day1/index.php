<!DOCTYPE html>
<html>
<body>
 
    <h1>My super list :</h1>

    <?php
        $array = [
            "1"=> "test1",
            "2"=> "test2",
            "3"=> "test3"
        ];
        foreach ($array as $key => $value) {
            echo "index " . $key . " value " . $value ."<br/>";
        };

        function greet(string $name) {
            echo "Hello ". $name .".<br/>";
        }

        greet("Jean")

    ?>

</body>
</html>