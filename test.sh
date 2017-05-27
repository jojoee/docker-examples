#!/bin/bash

declare -a sites=(
  "localhost:8001"
  "localhost:8002"
  "localhost:8011"
  "localhost:8012"
  "localhost:8013"
  "localhost:8014"
  "localhost:8015"
  "localhost:8021"
  "localhost:8022"
  "localhost:8023"
  "localhost:8031"
  "localhost:8032"
  "localhost:8033"
  "localhost:8041"
  "localhost:9001"
  "localhost:9002"
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
