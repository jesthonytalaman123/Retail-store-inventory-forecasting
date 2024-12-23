<!-- Horizontal Bar Chart Section -->
<div class="col-md-6 chart-container">
    <div class="border rounded p-3 shadow">
        <canvas id="myFourthChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx4 = document.getElementById('myFourthChart');
        
        if (ctx4) {
            // Data passed from the controller
            const categories = @json(array_keys($categoryCounts));  // Category names (e.g., Toys, Furniture)
            const categoryCounts = @json(array_values($categoryCounts));  // Category counts (number of items in each category)
            
            // Pass dynamic region and year values from the controller
            const selectedRegion = @json($selectedRegion);  // The selected region (e.g., "East", "West")
            const selectedYear = @json($selectedYear);  // The selected year (e.g., "2023")

            // Initialize the chart
            new Chart(ctx4, {
                type: 'bar', // Horizontal bar chart
                data: {
                    labels: categories,  // Categories (e.g., Toys, Furniture)
                    datasets: [{
                        label: `Total Item Category Sold`,  // Dynamically set label with region and year
                        data: categoryCounts,  // Category counts
                        backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'], // Colors for each bar
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y',  // Horizontal bars
                    plugins: {
                        title: {
                            display: true,
                            text: `Category Counts in ${selectedRegion} for Year ${selectedYear}`,  // Dynamic title
                            font: {
                                size: 16
                            },
                            color: 'black'
                        },
                        legend: {
                            position: 'top',
                            labels: {
                                color: 'black'
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                color: 'black'
                            }
                        },
                        y: {
                            ticks: {
                                color: 'black'
                            }
                        }
                    }
                }
            });
        }
    });
</script>
