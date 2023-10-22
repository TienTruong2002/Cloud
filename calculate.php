<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-3 mb-3">
        <h2>Simple basic operation</h2>
        <form class="form-group" method="get">
            <div class="mb-3">
            <select class="form-select" name="operation">
                <option selected>operation</option>
                <option value="sum">Sum</option>
                <option value="sub">Subtract</option>
            </select>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="a"value="">
                <label for="floatingInput">First Number</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="a" name="a" value="">
                <label for="floatingPassword">Second Number</label>
            </div>
            <br>
            <h4>
                <span class="badge bg-success"><?php echo $resul; ?></span>
            </h4>
            <button type="submit" class="btn btn-primary btn-md" name = "calculate">Calculate</button>
        </form>
    </div>
    <?php
    var_dump($_GET)
    ?>
</body>
