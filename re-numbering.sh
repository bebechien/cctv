#!/bin/bash

if [ $# != 1 ]; then
  echo "usage: $0 input_folder"
else
  mkdir re_$1
  CAM_IDX=1
  while [ $CAM_IDX -lt 4 ]; do
    files_in_dirs=($1/cam$CAM_IDX.*)
    COUNTER=0
    for item in ${files_in_dirs[*]}
    do
      cp $item re_$1/cam$CAM_IDX.$COUNTER.png
      let COUNTER=COUNTER+1
    done

    let CAM_IDX=CAM_IDX+1
  done
fi
