#!/usr/bin/python

import pandas as pd
import time

while True:

    data = pd.read_json("./materials_data.json")
    
    del data['views']
    del data['category']
    del data['subject']
    del data['update_date']
    del data['title']
    
    image_data = data.set_index('uid')
    
    image_data.to_json("./image_data.json") 
    time.sleep(60)