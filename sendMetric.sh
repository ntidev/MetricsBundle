#!/bin/bash
while :
do
#	echo "Press [CTRL+C] to stop.."
	#./send-metric nti:metric:count 
	./bin/send-metric nti:metrics:count greenlink.glbs.requests --host ntigraphite 
#	sleep 1
done
