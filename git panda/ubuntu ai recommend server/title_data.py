#!/usr/bin/python

import pandas as pd
import time

while True:

    data = pd.read_json("./materials_data.json")
    
    del data['views']
    del data['category']
    del data['subject']
    del data['update_date']
    
    title_data = data.set_index('uid')
    
    title_data.to_json("./title_data.json") 
    time.sleep(60)