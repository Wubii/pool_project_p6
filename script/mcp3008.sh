#!/bin/sh

script_dir=$(dirname $0)

mkdir -p $script_dir/../data

python $script_dir/mcp3008.py > $script_dir/../data/light.txt
