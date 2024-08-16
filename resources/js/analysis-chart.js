$(document).ready(function() {
    showChart1();
    showChart2();
    showChart3();
    showChart4();
    showChart5();
    showChart6();
    showChart7();
});

const showChart1 = () => {
    // browser "localhost:8000/chart-data-1" to check if js receives datatable
    $.get(chart_data_1, function(data) {
        if (!hasData(data)) {
            showNoData('#barchart_passingrate');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("barchart_passingrate", {
                type: 'bar',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                // Convert decimal to percentage
                                label: function(tooltipItem) {
                                    var value = Math.round(tooltipItem.raw * 100);
                                    return value + '%';
                                }
                            }
                        },
                        datalabels: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            suggestedMin: 0, // Minimum value for the y-axis
                            suggestedMax: 1, // Maximum value for the y-axis
                            title: {
                                display: true,
                                text: 'Percentage(%)'
                            },
                            ticks: {
                                // convert decimal to percentage
                                callback: function(value, index, values) {
                                    return (value * 100) + '%';
                                }
                            }
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#barchart_passingrate');
    });
}

const showChart2 = () => {
    // browser "localhost:8000/chart-data-2" to check if js receives datatable
    $.get(chart_data_2, function(data) {
        if (!hasData(data)) {
            showNoData('#barchart_avgscore');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            // draw vertical bar chart
            new Chart("barchart_avgscore", {
                type: "bar",
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                // round to nearest 1 decimal place
                                label: function(tooltipItem) {
                                    var value = (Math.round(tooltipItem.raw * 10) /10).toFixed(1);
                                    return value;
                                }
                            }
                        },
                        datalabels: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            suggestedMin: 0, // Minimum value for the y-axis
                            suggestedMax: 100, // Maximum value for the y-axis
                            title: {
                                display: true,
                                text: "Score"
                            },
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#barchart_avgscore');
    });
}

const showChart3 = () => {
    // browser "localhost:8000/chart-data-3" to check if js receives datatable
    $.get(chart_data_3, function(data) {
        if (!hasData(data)) {
            showNoData('#piechart_grademandarin');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("piechart_grademandarin", {
                type: "pie",
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            color: 'black',
                            labels: {
                                title: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#piechart_grademandarin');
    });
}

const showChart4 = () => {
    // browser "localhost:8000/chart-data-4" to check if js receives datatable
    $.get(chart_data_4, function(data) {
        if (!hasData(data)) {
            showNoData('#piechart_gradeenglish');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("piechart_gradeenglish", {
                type: "pie",
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            color: 'black',
                            labels: {
                                title: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#piechart_gradeenglish');
    });
}

const showChart5 = () => {
    // browser "localhost:8000/chart-data-5" to check if js receives datatable
    $.get(chart_data_5, function(data) {
        if (!hasData(data)) {
            showNoData('#piechart_grademalay');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("piechart_grademalay", {
                type: "pie",
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            color: 'black',
                            labels: {
                                title: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#piechart_grademalay');
    });
}

const showChart6 = () => {
    // browser "localhost:8000/chart-data-6" to check if js receives datatable
    $.get(chart_data_6, function(data) {
        if (!hasData(data)) {
            showNoData('#piechart_grademath');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("piechart_grademath", {
                type: "pie",
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            color: 'black',
                            labels: {
                                title: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#piechart_grademath');
    });
}

const showChart7 = () => {
    // browser "localhost:8000/chart-data-7" to check if js receives datatable
    $.get(chart_data_7, function(data) {
        if (!hasData(data)) {
            showNoData('#piechart_gradescience');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("piechart_gradescience", {
                type: "pie",
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            color: 'black',
                            labels: {
                                title: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            });
        }
    }).fail(function() {
        showNoData('#piechart_gradescience');
    });
}

// placeholder when fetched no data
const showNoData = (selector) => {
    const chartContainer = $(selector).parent();
    chartContainer.empty(); // clear container before appending
    $.get(no_record, function(data) {
        chartContainer.append(data);
    });
};

// check for empty/null data array
const hasData = (data) => {
    return data.datasets && data.datasets[0].data.every(value => value !== null);
}
