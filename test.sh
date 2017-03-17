#!/bin/bash

declare -a sites=(
  "localhost:8001"
  "localhost:8002"
  "localhost:8003"
  "localhost:8004"
  "localhost:8005"
  "localhost:8006"
  "localhost:8007"
  "localhost:9001"
)

for site in ${sites[@]}
do
  echo "================================"
  echo "Test curl to " + ${site}
  {
    curl ${site}
    echo ""
  } || {
    echo 'not work'
  }
done
