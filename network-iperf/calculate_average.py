import re
import os

# Define the full path to the directory where the files are located
directory = "network-iperf/From_ec2-cont-server-1/"
#directory = "network-iperf/From_ec2-hyper-server-2/"

# Define the pattern for the file names
file_pattern = re.compile(r'iperf_client_results_30s_run_\d+\.txt')

# Initialize a list to store the bandwidth values
bandwidth_values = []

# Loop over the files in the specified directory
for filename in os.listdir(directory):
    # Check if the file matches the pattern
    if file_pattern.match(filename):
        # Open the file and read the last line
        with open(os.path.join(directory, filename), "r") as file:
            lines = file.readlines()
            last_line = lines[-1]

        # Use regular expressions to match the bandwidth value
        bandwidth_pattern = re.compile(r'(\d+\.\d+\s\wbits/sec)')
        bandwidth_match = bandwidth_pattern.search(last_line)

        # Extract the bandwidth value and add it to the list
        if bandwidth_match:
            bandwidth = float(bandwidth_match.group(1).split()[0])
            if "Kbits/sec" in last_line:
                bandwidth /= 1000000
            elif "Mbits/sec" in last_line:
                bandwidth /= 1000
            bandwidth_values.append(bandwidth)

# Calculate the average bandwidth value
if bandwidth_values:
    average_bandwidth = sum(bandwidth_values) / len(bandwidth_values)
    print(f"Sum of values: {sum(bandwidth_values)}")
    print(f"Average bandwidth: {average_bandwidth:.2f} Gbits/sec")
    print(f"Total values accumulated: {len(bandwidth_values)}")
else:
    print("No matching files found.")