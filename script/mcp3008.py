#!/usr/bin/python

from gpiozero import MCP3008
 
print(MCP3008(0).value)
