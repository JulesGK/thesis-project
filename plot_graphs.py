""" The following Python script is made to automate the plotting of several AWS CloudWatch metrics over time. 
Because of the script's flexibility, we can quickly switch between various metrics 
(such CPU utilization and network data) while reducing the amount of hard-coded variables. """


import csv
import boto3
import matplotlib.pyplot as plt
from datetime import datetime
import matplotlib.dates as mdates
import os

def get_instance_name_from_filename(filename):
    # Assuming the filename is in the format: metric_statistic_instance.csv
    parts = os.path.splitext(os.path.basename(filename))[0].split('_')
    return parts[-1].replace('-', ' ').title()

def get_files_with_pattern(directory, pattern):
    files = [f for f in os.listdir(directory) if pattern in f]
    return [os.path.join(directory, f) for f in files]

def plot_metric(file_paths, labels, graph_title, units=''):
    plt.figure(figsize=(10, 5))

    for file_path, label in zip(file_paths, labels):
        timestamps = []
        values = []

        with open(file_path, 'r') as csvfile:
            csv_reader = csv.reader(csvfile)
            next(csv_reader)  # Skip header row
        
            for i, row in enumerate(csv_reader):
                if i % 2 == 0:
                    timestamp = datetime.strptime(row[0], '%Y-%m-%d %H:%M:%S')
                    timestamps.append(timestamp)
                    values.append(float(row[1]))

        # Plot the data with instance name as label
        plt.plot(timestamps, values, label=label, marker=' ', linewidth=1.5)

    plt.title(graph_title)
    plt.xlabel('Timestamp')
    plt.ylabel(f'Metric Value ({units})')
    plt.gca().xaxis.set_major_formatter(mdates.DateFormatter('%H:%M'))
    plt.gca().xaxis.set_major_locator(mdates.HourLocator(interval=3))  # Display one tick per hour

    plt.gcf().autofmt_xdate()  # Auto-format the x-axis date labels
    plt.legend(loc='upper right', fontsize=8)
    plt.grid(True)
    plt.show()

# Specify the metric and statistic type
#metric = 'cpu_utilization'
metric = 'ebs_read_bytes'
#metric = 'ebs_write_bytes'
statistic_types = ['maximum','minimum', 'average']

# Use the current working directory
directory = os.getcwd()

# Generate file paths based on the pattern
file_paths = {statistic: get_files_with_pattern(directory, f'{metric}_{statistic}_') for statistic in statistic_types}

# Plot the metrics
for statistic, files in file_paths.items():
    labels = [f'{get_instance_name_from_filename(os.path.basename(file))} ({statistic.capitalize()})' for file in files]
    graph_title = f'{metric.capitalize()} ({statistic.capitalize()}) Over Time'
    plot_metric(files, labels, graph_title, units='bytes')
