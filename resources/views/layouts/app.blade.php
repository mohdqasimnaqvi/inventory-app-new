<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        button.hover.bg-danger:hover {
            background-color: inherit !important;
        }
        .mqn-custom-file-input {
            color: transparent;
        }
        .mqn-custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .mqn-custom-file-input::before {
            content: "Select a file";
            display: inline-block;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
            padding: 10px 30px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            user-select: none;
        }
        .img-magnify {
            position: relative;
        }
        .img-magnifier-glass {
            position: absolute;
            border: 3px solid #000;
            border-radius: 50%;
            cursor: none;
            /*Set the size of the magnifier glass:*/
            width: 75px;
            height: 75px;
            background-color: #fff;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Inventory app</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://simpleupload.michaelcbrook.com/js/simpleUpload/simpleUpload.min.js" defer></script>
    <script defer src="/js/index.js" type="module"></script>
</head>

<body>
    <div class="bg-secondary">
        <nav class="navbar navbar-expand-lg navbar-dark container-md">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/monthly">Monthly Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daily">Daily Products</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
</body>

</html>
