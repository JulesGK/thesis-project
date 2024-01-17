import boto3
import csv
from datetime import datetime, timedelta

def get_instance_name(instance_id):
    ec2_client = boto3.client('ec2')
    response = ec2_client.describe_instances(InstanceIds=[instance_id])
    name_tag = next((tag['Value'] for tag in response['Reservations'][0]['Instances'][0]['Tags'] if tag['Key'] == 'Name'), None)
    return name_tag or instance_id

def collect_and_save_metric(instance_id, metric_name, file_prefix):
    cloudwatch_client = boto3.client('cloudwatch')

    # Get instance name
    instance_name = get_instance_name(instance_id)

    # Specify and calculate the desired time range
    #  the start and end times
    start_time = datetime.now() - timedelta(days=1, hours=13)
    end_time = datetime.now() - timedelta(hours=7)

    # Collect metric data for Average, Maximum, and Minimum
    stat_types = ['Average', 'Maximum', 'Minimum']
    for stat_type in stat_types:
        response = cloudwatch_client.get_metric_data(
            MetricDataQueries=[
                {
                    'Id': 'm1',
                    'MetricStat': {
                        'Metric': {
                            'Namespace': 'AWS/EC2',
                            'MetricName': metric_name,
                            'Dimensions': [
                                {
                                    'Name': 'InstanceId',
                                    'Value': instance_id
                                },
                            ]
                        },
                        'Period': 300,
                        'Stat': stat_type,
                    },
                    'ReturnData': True,
                },
            ],
            StartTime=start_time,
            EndTime=end_time,
        )

        metric_data = response['MetricDataResults'][0]['Values']
        timestamps = response['MetricDataResults'][0]['Timestamps']
        values = response['MetricDataResults'][0]['Values']

        # Save metric data to CSV
        file_path = '{}_{}_data_{}.csv'.format(file_prefix, stat_type.lower(), get_instance_name(instance_id))
        with open(file_path, mode='w', newline='') as csvfile:
            csv_writer = csv.writer(csvfile)
            csv_writer.writerow(['Timestamp', metric_name])
            for timestamp, value in zip(timestamps, values):
                csv_writer.writerow([timestamp.strftime('%Y-%m-%d %H:%M:%S'), value])

# List of instance IDs
instance_ids = ['i-033792d5c2b5a5338', 'i-0a2fea3487dee8b27']

# Loop through instances and collect metrics
for instance_id in instance_ids:
    # Collect and save CPU Utilization
    collect_and_save_metric(instance_id, 'CPUUtilization', 'cpu_utilization')

    # Collect and save Network In
    collect_and_save_metric(instance_id, 'NetworkIn', 'network_in')

    # Collect and save Network Out
    collect_and_save_metric(instance_id, 'NetworkOut', 'network_out')
   
    # Collect and save EBSWriteBytes
    collect_and_save_metric(instance_id, 'EBSWriteBytes', 'ebs_write_bytes')

    # Collect and save EBSReadBytes
    collect_and_save_metric(instance_id, 'EBSReadBytes', 'ebs_read_bytes')

   
                