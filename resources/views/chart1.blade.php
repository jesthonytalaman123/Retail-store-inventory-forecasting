<!-- Chart Section -->
<div class="col-12 chart-container">
    <div class="line-chart-container border rounded p-3 shadow mx-auto">
        <canvas id="mySecondChart"></canvas>
    </div>
</div>

<script>
    @if ($selectedYear)
        // Prepare data for the chart
        const labels = [
            @foreach ($monthlyUnitsSold as $data)
                "{{ \Carbon\Carbon::create()->month($data->month)->format('F') }}",
            @endforeach
        ];

        const unitsSold = [
            @foreach ($monthlyUnitsSold as $data)
                {{ $data->total_units_sold }},
            @endforeach
        ];

        // Initialize the line chart
        const ctx2 = document.getElementById('mySecondChart');
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Units Sold',  // This label will appear in the chart legend
                    data: unitsSold,
                    fill: true,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                    borderColor: 'rgba(75, 192, 192, 1)', 
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: `Monthly Units Sold for {{ $selectedYear }}`,  // Dynamic title using selected year
                        color: 'black',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                        padding: {
                            top: 10,
                            bottom: 20
                        }
                    },
                    legend: {
                        position: 'top',  // Display the legend outside the chart (top, left, right, bottom)
                        labels: {
                            color: 'black',  // Color of the legend labels
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;  // Add label to tooltips
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black'
                        },
                        title: {
                            display: true,
                            text: 'Units Sold',
                            color: 'black'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'black'
                        },
                        title: {
                            display: true,
                            text: 'Months',
                            color: 'black'
                        }
                    }
                }
            }
        });
    @endif
</script>
