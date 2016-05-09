#!/bin/bash

if [ $# != 1 ]; then
  echo "usage: $0 input_folder"
else
  mkdir re_frames_$1
  CAM_IDX=1
  while [ $CAM_IDX -lt 4 ]; do
    mkdir frames_$1
    mkdir temp
    files_in_dirs=($1/0$CAM_IDX/rec/*)
    COUNTER=100
    for item in ${files_in_dirs[*]}
    do
      avconv -i $item "frames_$1/cam$CAM_IDX.$COUNTER%03d.png"
      avconv -i $item -vf scale=320:-1:flags=lanczos "temp/$COUNTER%03d.png"
      let COUNTER=COUNTER+1
    done
    convert -loop 0 temp/*.png $1_$CAM_IDX.gif
    rm -rf temp

    files_in_dirs=(frames_$1/cam$CAM_IDX.*)
    COUNTER=0
    for item in ${files_in_dirs[*]}
    do
      cp $item re_frames_$1/cam$CAM_IDX.$COUNTER.png
      let COUNTER=COUNTER+1
    done
    rm -rf frames_$1

    let CAM_IDX=CAM_IDX+1
  done
fi
