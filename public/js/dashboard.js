const ctx = document.getElementById('progressChart').getContext('2d');

const now = new Date();
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
const currentMonth = now.getMonth();

const labels = [];
for (let i = 0; i < 12; i++) {
  const monthIndex = (currentMonth + 1 - i + 12) % 12;
  labels.push(months[monthIndex]);
}
labels.reverse();

const progressChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Learning Progress',
      data: window.progressData ?? [],
      borderColor: '#2563eb',
      backgroundColor: 'rgba(37, 99, 235, 0.2)',
      tension: 0.3,
      pointRadius: 5,
      pointHoverRadius: 7,
      fill: true
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
        max: 100
      }
    }
  }
});
