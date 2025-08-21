<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            padding: 20px;
            background-color: #f4f4f4;  
        }
        .center {
            display: flex;
            justify-content: center;
        }
        .calculator {
            background: white;
            padding: 30px;
            width: 500px;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            width: 95%;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 30px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 1px 15px 15px;
            border-radius: 30px;
            text-align: center;
            font-weight: bold;
            background-color: #d3d3d3ff;
            color: #949494ff; 
        }
    </style>
</head>
<body>
    <div class="center">
        <div class="calculator">
            <h2>Kalkulator BMI</h2>  
            <form method="POST">
                <div class="form-group">
                    <label for="berat">Berat Badan (kg):</label>
                    <input type="number" id="berat" name="berat" step="0.1" min="1" max="300" required>
                </div>          
                <div class="form-group">
                    <label for="tinggi">Tinggi Badan (cm):</label>
                    <input type="number" id="tinggi" name="tinggi" min="50" max="250" required>
                </div>
                <button type="submit" name="hitung">Hitung BMI</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hitung'])) {
                $berat_kg = floatval($_POST['berat']);
                $tinggi_cm = floatval($_POST['tinggi']);
                
                if ($berat_kg  && $tinggi_cm ) {
                    $tinggi_m = $tinggi_cm / 100;
                    $bmi = $berat_kg / ($tinggi_m * $tinggi_m);
                    $bmi_rounded = round($bmi, 1);

                    if ($bmi < 18.5) {
                        $kategori = "Underweight";                   
                    } elseif ($bmi < 25) {
                        $kategori = "Normal";                    
                    } elseif ($bmi < 30) {
                        $kategori = "Overweight";                     
                    } else {
                        $kategori = "Obesity";
                    }

                    echo "<div class='result '>";
                    echo "<h3>Hasil Perhitungan BMI</h3>";
                    echo "Berat: $berat_kg kg<br>";
                    echo "Tinggi: $tinggi_cm cm<br>";
                    echo "BMI: $bmi_rounded<br>";
                    echo "Kategori: $kategori";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
