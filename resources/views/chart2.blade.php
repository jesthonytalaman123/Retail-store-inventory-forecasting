<div class="col-md-6 chart-container">
    <div class="border rounded p-3 shadow">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    const ctx1 = document.getElementById('myChart');

    // Data passed from the controller
    const totalUnitsSold = @json($totalUnitsSold);  // Total units sold for the selected season and year
    const totalUnitsOrdered = @json($totalUnitsOrdered);  // Total units ordered for the selected season and year
    const totalInventoryLevel = @json($totalInventoryLevel);  // Total inventory level for the selected season and year

    // Fetch the selected season and year values from the controller
    const selectedSeason = @json($selectedSeason);  // Season selected by the user
    const selectedYear = @json($selectedYear);  // Year selected by the user

    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Total Units Sold', 'Total Units Ordered', 'Total Inventory Level'],
            datasets: [{
                label: 'Units Sold, Ordered, and Inventory Level',
                data: [totalUnitsSold, totalUnitsOrdered, totalInventoryLevel],
                borderWidth: 1,
                backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(75, 192, 192, 0.6)'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: `Data for ${selectedSeason} - ${selectedYear}`,
                    font: {
                        size: 16,
                        family: 'Arial',
                        weight: 'bold'
                    },
                    color: 'black' // Title label color
                },
                legend: {
                    labels: {
                        color: 'black' // Legend labels color
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'black' // Y-axis labels color
                    }
                },
                x: {
                    ticks: {
                        color: 'black' // X-axis labels color
                    }
                }
            }
        }
    });
</script>
