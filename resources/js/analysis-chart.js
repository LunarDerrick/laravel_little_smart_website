// initial set of charts loading
$(document).ready(function() {
    showChart1();
    showChart2();
    showChart3();
    showChart4();
    showChart5();
    showChart6();
    showChart7();
    showChart8();
});

const showChart1 = () => {
    // browser "localhost:8000/chart-data-1" to check if js receives datatable
    $.get(chart_data_1, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_01');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_01", {
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
        showNoData('#chartjs_01');
    });
}

const showChart2 = () => {
    // browser "localhost:8000/chart-data-2" to check if js receives datatable
    $.get(chart_data_2, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_02');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            // draw vertical bar chart
            new Chart("chartjs_02", {
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
        showNoData('#chartjs_02');
    });
}

const showChart3 = () => {
    // browser "localhost:8000/chart-data-3" to check if js receives datatable
    $.get(chart_data_3, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_03');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_03", {
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
        showNoData('#chartjs_03');
    });
}

const showChart4 = () => {
    // browser "localhost:8000/chart-data-4" to check if js receives datatable
    $.get(chart_data_4, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_04');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_04", {
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
        showNoData('#chartjs_04');
    });
}

const showChart5 = () => {
    // browser "localhost:8000/chart-data-5" to check if js receives datatable
    $.get(chart_data_5, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_05');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_05", {
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
        showNoData('#chartjs_05');
    });
}

const showChart6 = () => {
    // browser "localhost:8000/chart-data-6" to check if js receives datatable
    $.get(chart_data_6, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_06');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_06", {
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
        showNoData('#chartjs_06');
    });
}

const showChart7 = () => {
    // browser "localhost:8000/chart-data-7" to check if js receives datatable
    $.get(chart_data_7, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_07');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_07", {
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
        showNoData('#chartjs_07');
    });
}

const showChart8 = () => {
    // browser "localhost:8000/chart-data-8" to check if js receives datatable
    $.get(chart_data_8, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_08');
        } else {
            // importing datalabel plugin
            Chart.register(ChartDataLabels);

            new Chart("chartjs_08", {
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
        showNoData('#chartjs_08');
    });
}

const showChart9 = () => {
    $.get(chart_data_9, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_01');
        }
    }).fail(function() {
        showNoData('#chartjs_01');
    });
}

const showChart10 = () => {
    $.get(chart_data_10, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_02');
        }
    }).fail(function() {
        showNoData('#chartjs_02');
    });
}

const showChart11 = () => {
    $.get(chart_data_11, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_03');
        }
    }).fail(function() {
        showNoData('#chartjs_03');
    });
}

const showChart12 = () => {
    $.get(chart_data_12, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_04');
        }
    }).fail(function() {
        showNoData('#chartjs_04');
    });
}

const showChart13 = () => {
    $.get(chart_data_13, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_05');
        }
    }).fail(function() {
        showNoData('#chartjs_05');
    });
}

const showChart14 = () => {
    $.get(chart_data_14, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_06');
        }
    }).fail(function() {
        showNoData('#chartjs_06');
    });
}

const showChart15 = () => {
    $.get(chart_data_15, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_07');
        }
    }).fail(function() {
        showNoData('#chartjs_07');
    });
}

const showChart16 = () => {
    $.get(chart_data_16, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_08');
        }
    }).fail(function() {
        showNoData('#chartjs_08');
    });
}

const showChart17 = () => {
    $.get(chart_data_17, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_01');
        }
    }).fail(function() {
        showNoData('#chartjs_01');
    });
}

const showChart18 = () => {
    $.get(chart_data_18, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_02');
        }
    }).fail(function() {
        showNoData('#chartjs_02');
    });
}

const showChart19 = () => {
    $.get(chart_data_19, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_03');
        }
    }).fail(function() {
        showNoData('#chartjs_03');
    });
}

const showChart20 = () => {
    $.get(chart_data_20, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_04');
        }
    }).fail(function() {
        showNoData('#chartjs_04');
    });
}

const showChart21 = () => {
    $.get(chart_data_21, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_05');
        }
    }).fail(function() {
        showNoData('#chartjs_05');
    });
}

const showChart22 = () => {
    $.get(chart_data_22, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_06');
        }
    }).fail(function() {
        showNoData('#chartjs_06');
    });
}

const showChart23 = () => {
    $.get(chart_data_23, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_07');
        }
    }).fail(function() {
        showNoData('#chartjs_07');
    });
}

const showChart24 = () => {
    $.get(chart_data_24, function(data) {
        if (!hasData(data)) {
            showNoData('#chartjs_08');
        }
    }).fail(function() {
        showNoData('#chartjs_08');
    });
}

const chartContainers = [
    'chartjs_01',
    'chartjs_02',
    'chartjs_03',
    'chartjs_04',
    'chartjs_05',
    'chartjs_06',
    'chartjs_07',
    'chartjs_08'
];

const charts = {
    Subject: [showChart1, showChart2, showChart3, showChart4, showChart5, showChart6, showChart7, showChart8],
    Standard: [showChart9, showChart10, showChart11, showChart12, showChart13, showChart14, showChart15, showChart16],
    'Specific Student': [showChart17, showChart18, showChart19, showChart20, showChart21, showChart22, showChart23, showChart24],
};

function updateSelection(option) {
    // update dropdown text
    document.getElementById('selected-option').innerText = option;

    // update chart
    charts[option].forEach((chartFunc, i) => {
        const chartContainer = document.getElementById(chartContainers[i]);

        // clear existing content first
        const oldChart = Chart.getChart(chartContainer);
        if (oldChart) oldChart.destroy();
        $(chartContainer).show();
        $(chartContainer).siblings('.text-center').remove();

        // populate new content
        chartFunc();

        // resizing for piecharts
        $(chartContainer).removeClass('piechart');
        if (option != 'Spcific Student') {
            if (i > 1) {
                $(chartContainer).addClass('piechart');
            } else {
                $(chartContainer).removeClass('piechart');
            }
        }
    });
}

// placeholder when fetched no data
const showNoData = (selector) => {
    const chartContainer = $(selector).parent();
    const oldChart = Chart.getChart($(selector));
    // destroy previous chart and hide container
    if (oldChart) oldChart.destroy();
    $(selector).hide();
    // append content to indicate fail to load
    $.get(no_record, function(data) {
        chartContainer.append(data);
    });
};

// check for empty/null data array
const hasData = (data) => {
    return data.datasets && data.datasets[0].data.every(value => value !== null);
}

// ensure JS variables are passed to HTML
window.updateSelection = updateSelection;
