#!/bin/bash

# Server IP address (replace with the IP of the iperf server)
SERVER_IP="13.49.226.121"

# Test durations
DURATIONS=("10" "20" "30")

# Number of runs
NUM_RUNS=10

for DURATION in "${DURATIONS[@]}"; do
    for ((i = 1; i <= NUM_RUNS; i++)); do
        # Output file
        OUTPUT_FILE="iperf_client_results_${DURATION}s_run_${i}.txt"

        echo "Running iperf test from this EC2 instance to ${SERVER_IP} for ${DURATION} seconds (Run ${i})"
        iperf -c "${SERVER_IP}" -i 1 -t "${DURATION}" > "${OUTPUT_FILE}"
        echo "Iperf test completed. Results saved in ${OUTPUT_FILE}"

        # Sleep for 10 seconds between runs
        sleep 10
    done
done
