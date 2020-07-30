#!/usr/bin/env python

#import sys
from sys import argv
import operator
import csv
#import pandas
#print sys.path

script, what_he_said,  = argv

argus = what_he_said.split("!")

"""
for i in argus:
    print argus
"""
print "This is what you submitted: %s \n \n Isn't that amazing, man? " % what_he_said

#print("This is what you submitted: " + what_he_said)