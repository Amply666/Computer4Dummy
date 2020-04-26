#!/bin/bash
CPU=$(</sys/class/thermal/thermal_zone0/temp)
TEMP=50000
echo "2" > /sys/class/gpio/export
echo out > /sys/class/gpio/gpio2/direction
echo 0 > /sys/class/gpio/gpio2/value
STATUS=0

while :
do
    CPU=$(</sys/class/thermal/thermal_zone0/temp)
    MHZ=$(</sys/devices/system/cpu/cpu0/cpufreq/cpuinfo_cur_freq)
    echo "$(date)"
    echo "FAN: $STATUS"
    echo "CPU: $((CPU/1000))'C"
    echo "GPU: $(/opt/vc/bin/vcgencmd measure_temp)"
    echo "MHZ: $((MHZ/1000))"
    if [ "$CPU" -gt "$TEMP" ]&&[ "$STATUS" -lt 1 ]
    then
        STATUS=1
        echo "devo accendere la ventola $CPU | $TEMP | $STATUS "
        echo "1" > /sys/class/gpio/gpio2/value
    elif [ "$CPU" -lt "$TEMP" ]&&[ "$STATUS" -gt 0 ]
    then
        STATUS=0
        echo "devo spegnere la ventola $CPU | $TEMP | $STATUS "
        echo "0" > /sys/class/gpio/gpio2/value
    fi
    sleep 15
done
