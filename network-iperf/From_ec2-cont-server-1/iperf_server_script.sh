#!/bin/bash

# Output file for server results
OUTPUT_FILE="iperf_server_results.txt"

echo "Running iperf in server mode"
iperf -s > "${OUTPUT_FILE}"
echo "Iperf server completed. Results saved in ${OUTPUT_FILE}"
