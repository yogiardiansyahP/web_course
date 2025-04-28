const ctx = document.getElementById('progressChart').getContext('2d');
const progressChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'],
    datasets: [{
      label: 'Progress Belajar',
      data: window.progressData ?? [],
      borderColor: '#2563eb',
      backgroundColor: 'rgba(37, 99, 235, 0.2)',
      tension: 0.3,
      pointRadius: 5,
      pointHoverRadius: 7,
      fill: false
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        max: 110
      }
    }
  }
});
