<nav class="navbar navbar-expand-lg custom-navbar shadow mt-2">
    <div class="container">
        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <div class="d-flex align-items-center gap-3">
                <!-- Dropdown Selection Form -->
                <form action="{{ route('dashboard') }}" method="POST" class="mb-0" id="filterForm">
                    @csrf
                    <div class="d-flex align-items-center gap-3">
                        <!-- Year Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Year
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($years as $year)
                                    <li>
                                        <a class="dropdown-item filter-option" href="#" onclick="selectOption('year', '{{ $year }}')">
                                            {{ $year }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Season Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Season
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($seasons as $season)
                                    <li>
                                        <a class="dropdown-item filter-option" href="#" onclick="selectOption('seasonality', '{{ $season }}')">
                                            {{ $season }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Region Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Region
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($regions as $region)
                                    <li>
                                        <a class="dropdown-item filter-option" href="#" onclick="selectOption('region', '{{ $region }}')">
                                            {{ $region }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Hidden Fields to Store Selected Values -->
                    <input type="hidden" name="year" id="selectedYear" value="{{ old('year', $selectedYear) }}">
                    <input type="hidden" name="seasonality" id="selectedSeasonality" value="{{ old('seasonality', $selectedSeason) }}">
                    <input type="hidden" name="region" id="selectedRegion" value="{{ old('region', $selectedRegion) }}">
                </form>
            </div>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<script>
    // Function to handle the selection of dropdown items
    function selectOption(filter, value) {
        // Set the value of the hidden input based on the dropdown selection
        if (filter === 'year') {
            document.getElementById('selectedYear').value = value;
        } else if (filter === 'seasonality') {
            document.getElementById('selectedSeasonality').value = value;
        } else if (filter === 'region') {
            document.getElementById('selectedRegion').value = value;
        }

        // Submit the form to fetch data for the selected filters
        document.getElementById('filterForm').submit();
    }
</script>
