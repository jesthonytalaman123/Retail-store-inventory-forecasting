<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analytics Final Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.2/papaparse.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('style')
</head>
<body>
    @include('sidebar')
    <div id="content">
        <div class="text-center p-4 bg-light rounded shadow d-flex justify-content-between align-items-center">
            <h1 class="fw-bold custom-title mb-0">DA4B_GROUP4</h1>
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Members
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">JESTHONY T.</a></li>
                    <li><a class="dropdown-item" href="#">MARRY ANN JOYCE T.</a></li>
                    <li><a class="dropdown-item" href="#">JAZYL M.</a></li>
                    <li><hr class="dropdown-divider"></li>
                <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-primary" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </button>
                </form>
                </li>
                </ul>
            </div>
        </div>

        @include('nav')

        <div class="container mt-4">
            <div class="row d-flex flex-wrap">
                @include('chart1')
                @include('chart2')
                @include('chart3')   
            </div>
        </div>

    </div>

    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="aboutModalLabel">About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This dataset provides synthetic yet realistic data for analyzing and forecasting retail store inventory demand. It contains over 73,000 rows of daily data across multiple stores and products, including attributes like sales, inventory levels, pricing, weather, promotions, and holidays.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
